<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function show(User $user)
    {
        $user->load(['ads' => function ($query) {
            $query->where('status', 'available')->latest();
        }, 'ratingsReceived' => function ($query) {
            $query->whereNotNull('published_at')->latest();
        }]);

        $averageRating = $user->ratingsReceived->avg('rating');

        return view('profiles.show', [
            'user' => $user,
            'averageRating' => $averageRating,
        ]);
    }
}
