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

        if ($transactionStatus === 'settlement' || $transactionStatus === 'capture' || $transactionStatus === 'success') {
            if ($booking->paymentStatus === 'CREATED') {
                if ($booking->payment_termination == 1) {
                    $booking->paymentStatus = 'FULLY_PAID';

                } elseif ($booking->payment_termination == 2) {
                    $booking->paymentStatus = 'DOWN_PAYMENT_PAID';
                    $booking->installment = $booking->downPayment;
                    $booking->downPayment = null;
                }
            } elseif ($booking->paymentStatus === 'FULL_PAYMENT_PENDING') {
                $booking->paymentStatus = 'FULLY_PAID';

            } elseif ($booking->paymentStatus === 'DOWN_PAYMENT_PENDING') {
                $booking->paymentStatus = 'DOWN_PAYMENT_PAID';
                $booking->installment = $booking->downPayment;
                $booking->downPayment = null;

            } elseif ($booking->paymentStatus === 'DOWN_PAYMENT_PAID' || $booking->paymentStatus === 'INSTALLMENT_PENDING') {
                $booking->paymentStatus = 'INSTALLMENT_PAID';
                $booking->installment = null;
            }
        } elseif ($transactionStatus === 'pending') {
            if ($booking->paymentStatus === 'CREATED') {
                if ($booking->payment_termination == 1) {
                    $booking->paymentStatus = 'FULL_PAYMENT_PENDING';

                } elseif ($booking->payment_termination == 2) {
                    $booking->paymentStatus = 'DOWN_PAYMENT_PENDING';
                }
            } elseif ($booking->paymentStatus === 'DOWN_PAYMENT_PAID') {
                $booking->paymentStatus = 'INSTALLMENT_PENDING';
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

        if ($booking->paymentStatus === 'FULL_PAYMENT_PENDING') {
            $alertMessage = 'Please Complete Payment!';

        } else if ($booking->paymentStatus === 'FULLY_PAID') {
            $alertMessage = 'Payment Complete!';

        } else if ($booking->paymentStatus === 'DOWN_PAYMENT_PENDING') {
            $alertMessage = 'Please Complete Down Payment!';

        } else if ($booking->paymentStatus === 'DOWN_PAYMENT_PAID') {
            $alertMessage = 'Down Payment Paid!';
            $paymentCode = 'INS';
            $order_id = $paymentCode . '/' . '000' . random_int(1000, 9999);
            $grossAmount = $booking->installment;
            $booking->order_id = $order_id;
            $booking->update();

            $this->midtransService->initPaymentGateway();
            $this->_generatePaymentToken($booking, $grossAmount);

        } else if ($booking->paymentStatus === 'INSTALLMENT_PENDING') {
            $alertMessage = 'Please Complete Installment Payment!';

        } else if ($booking->paymentStatus === 'INSTALLMENT_PAID') {
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
