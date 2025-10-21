<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    use AuthorizesRequests;
    public function create(Transaction $transaction)
    {
        $this->authorize('create', [Rating::class, $transaction]);
        return view('ratings.create', compact('transaction'));
    }

    public function store(Request $request, Transaction $transaction)
    {
        $this->authorize('create', [Rating::class, $transaction]);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $ratee_id = $transaction->buyer_id === Auth::id() ? $transaction->ad->user_id : $transaction->buyer_id;

        $rating = Rating::create([
            'transaction_id' => $transaction->id,
            'rater_id' => Auth::id(),
            'ratee_id' => $ratee_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $otherRating = Rating::where('transaction_id', $transaction->id)
            ->where('rater_id', $ratee_id)
            ->first();

        if ($otherRating) {
            $rating->update(['published_at' => now()]);
            $otherRating->update(['published_at' => now()]);
        }

        return redirect()->route('dashboard')->with('status', 'Évaluation enregistrée !');
    }
}
