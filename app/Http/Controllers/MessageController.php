<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $conversations = Conversation::where('buyer_id', $user->id)
                                     ->orWhere('seller_id', $user->id)
                                     ->with(['ad', 'buyer', 'seller', 'messages' => function ($query) {
                                         $query->latest();
                                     }])
                                     ->get();
        return view('messages.index', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        $this->authorize('view', $conversation);
        $conversation->load(['messages.user', 'ad']);
        return view('messages.show', compact('conversation'));
    }

    public function store(Request $request, Ad $ad)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $user = Auth::user();

        // Prevent seller from contacting themselves
        if ($user->id === $ad->user_id) {
            return redirect()->back()->with('error', 'You cannot send a message to yourself.');
        }

        $conversation = Conversation::firstOrCreate(
            [
                'ad_id' => $ad->id,
                'buyer_id' => $user->id,
            ],
            [
                'seller_id' => $ad->user_id,
            ]
        );

        $message = new Message([
            'user_id' => $user->id,
            'body' => $request->body,
        ]);

        $conversation->messages()->save($message);

        return redirect()->route('messages.show', $conversation);
    }

    public function makeOffer(Request $request, Conversation $conversation)
    {
        $this->authorize('update', $conversation);

        $request->validate([
            'offer_price' => 'required|numeric|min:0',
        ]);

        $message = new Message([
            'user_id' => Auth::id(),
            'body' => 'I would like to make an offer.',
            'offer_price' => $request->offer_price,
        ]);

        $conversation->messages()->save($message);

        return redirect()->route('messages.show', $conversation);
    }

    public function respondToOffer(Request $request, Message $message)
    {
        $conversation = $message->conversation;
        $this->authorize('update', $conversation);

        $request->validate([
            'status' => 'required|in:accepted,declined',
        ]);

        $message->update(['offer_status' => $request->status]);

        return redirect()->route('messages.show', $conversation);
    }
}
