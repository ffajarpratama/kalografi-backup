<?php

namespace App\Http\Controllers;

use App\Http\Services\MidtransService;
use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Notification;
use Midtrans\Snap;

class PaymentController extends Controller
{

    private $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function _generatePaymentToken($booking, $grossAmount)
    {
        $this->midtransService->initPaymentGateway();

        $customerDetails = [
            'first_name' => $booking->fullname,
            'email' => $booking->email,
            'phone' => $booking->phonenumber
        ];

        $params = [
            'enable_payments' => Booking::PAYMENT_CHANNELS,
            'transaction_details' => [
                'order_id' => $booking->order_id,
                'gross_amount' => $grossAmount
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T', strtotime($booking->created_at)),
                'unit' => Booking::EXPIRY_UNIT,
                'duration' => Booking::EXPIRY_DURATION
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        if ($snapToken) {
            $booking->paymentToken = $snapToken;
            $booking->save();
        }

        return $booking;
    }

    //MIDTRANS TESTING
    public function notification(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $this->midtransService->initPaymentGateway();
        $paymentNotification = new Notification();

        $transactionStatus = $paymentNotification->transaction_status;
        $transactionOrderID = $paymentNotification->order_id;

        $booking = Booking::query()
            ->where('order_id', $transactionOrderID)
            ->firstOrFail();

        //CHECK IF THE TRANSACTION STATUS IS SETTLEMENT, CAPTURE, OR COMPLETE
        if ($transactionStatus == 'settlement' || $transactionStatus == 'capture' || $transactionStatus == 'success') {
            //PAYMENT STATUS IS CREATED?
            if ($booking->paymentStatus === 'CREATED') {
                //PAYMENT IS FULL?
                if ($booking->payment_termination == 1) {
                    //SET PAYMENT STATUS TO FULLY_PAID
                    $booking->paymentStatus = 'FULLY_PAID';
                    //PAYMENT IS 2X PAYMENT?
                } elseif ($booking->payment_termination == 2) {
                    //SET PAYMENT STATUS TO DOWN_PAYMENT_PAID
                    $booking->paymentStatus = 'DOWN_PAYMENT_PAID';
                    //INSTALLMENT = TOTAL PRICE / 2 (down payment amount),
                    $booking->installment = $booking->downPayment;
                    //SET DOWN PAYMENT TO NULL
                    $booking->downPayment = null;
                }
                //PAYMENT STATUS IS DOWN_PAYMENT_PAID?
            } elseif ($booking->paymentStatus === 'DOWN_PAYMENT_PAID') {
                //SET PAYMENT STATUS TO INSTALLMENT_PAID
                $booking->paymentStatus = 'INSTALLMENT_PAID';
                //SET INSTALLMENT TO NULL
                $booking->installment = null;
            }
        }

        $booking->update();

        return response('OK', 200);
    }

    public function completed(Request $request)
    {
        $bookingOrderId = $request->query('order_id');
        $booking = Booking::query()
            ->where('order_id', $bookingOrderId)
            ->firstOrFail();

        //PAYMENT STATUS IS CREATED?
        if ($booking->paymentStatus === 'CREATED') {
            //SET ALERT MESSAGE TO COMPLETE PAYMENT
            $alertMessage = 'Please Complete Payment!';

        //PAYMENT STATUS IS FULLY PAID?
        } else if ($booking->paymentStatus === 'FULLY_PAID') {
            //SET ALERT MESSAGE TO PAYMENT COMPLETE
            $alertMessage = 'Payment Complete!';

        //PAYMENT STATUS IS DOWN PAYMENT PAID?
        } else if ($booking->paymentStatus === 'DOWN_PAYMENT_PAID') {
            //SET ALERT MESSAGE TO DOWN PAYMENT PAID
            $alertMessage = 'Down Payment Paid!';
            //SET GROSS AMOUNT FOR INSTALLMENT PAYMENT
            $grossAmount = $booking->installment;
            //SET PAYMENT CODE FOR INSTALLMENT ORDER ID
            $paymentCode = 'INS';
            //SET ORDER ID FOR INSTALLMENT TRANSACTION
            $order_id = $paymentCode . '/' . '000' . random_int(1000, 9999);
            //SET ORDER ID OF THE BOOKING TO THE NEW ORDER ID USED FOR INSTALLMENT PAYMENT
            $booking->order_id = $order_id;

            //INITIALIZE PAYMENT GATEWAY
            $this->midtransService->initPaymentGateway();
            //GENERATE SNAP TOKEN FOR INSTALLMENT PAYMENT
            $this->_generatePaymentToken($booking, $grossAmount);

            $booking->update();

        //PAYMENT STATUS IS INSTALLMENT PAID?
        } else if ($booking->paymentStatus === 'INSTALLMENT_PAID') {
            //SET ALERT MESSAGE TO INSTALLMENT PAID, PAYMENT HAS BEEN COMPLETED
            $alertMessage = 'Installment Paid! Payment Complete!';
        }

        return redirect('/search?order_id=' . $booking->id)->with('message', $alertMessage);
    }

    public function unfinished(Request $request)
    {
        $order_id = $request->query('order_id');
        $booking = Booking::query()
            ->where('order_id', $order_id)
            ->firstOrFail();

        return response([
            'message' => 'Payment Unfinished!',
            'data' => $booking
        ], 200);
    }

    public function failed(Request $request)
    {
        $order_id = $request->query('order_id');
        $booking = Booking::query()
            ->where('order_id', $order_id)
            ->firstOrFail();

        return response([
            'message' => 'Payment Failed!',
            'data' => $booking
        ], 200);
    }
}
