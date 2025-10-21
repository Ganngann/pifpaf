<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyerConfirmationMail;
use App\Mail\SellerNotificationMail;

class PaymentController extends Controller
{
    public function create(Request $request, Ad $ad)
    {
        $offer_price = $request->query('offer_price');
        return view('payments.create', compact('ad', 'offer_price'));
    }

    public function store(Request $request, Ad $ad)
    {
        $user = Auth::user();

        // Simulate payment processing
        $transaction = Transaction::create([
            'ad_id' => $ad->id,
            'buyer_id' => $user->id,
            'seller_id' => $ad->user_id,
            'amount' => $request->amount,
            'status' => 'completed',
        ]);

        $ad->update(['status' => 'sold']);

        Mail::to($user)->send(new BuyerConfirmationMail($transaction));
        Mail::to($ad->user)->send(new SellerNotificationMail($transaction));

        return redirect()->route('dashboard')->with('success', 'Payment successful!');
    }
}
