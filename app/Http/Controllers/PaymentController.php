<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function updatePrice($id)
    {
        $booking = Booking::query()->findOrFail($id);
        $booking->isPaymentCompleted = false;
        $alertMessage = 'Total Price Paid!';

        if ($booking->payment_termination == 2) {
            if ($booking->downPayment && $booking->installment) {
                $booking->downPayment = null;
                $booking->isPaymentCompleted = false;
                $alertMessage = 'Down Payment Paid!';
            } elseif ($booking->installment) {
                $booking->installment = null;
                $booking->isPaymentCompleted = true;
                $alertMessage = 'Installment Paid!';
            }
        }

        if ($booking->payment_termination == 1) {
            $booking->isPaymentCompleted = true;
        }

        $booking->update();

        return redirect()->back()->with('message', $alertMessage);
    }
}
