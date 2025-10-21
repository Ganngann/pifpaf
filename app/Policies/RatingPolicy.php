<?php

namespace App\Policies;

use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Transaction $transaction)
    {
        return $user->id === $transaction->buyer_id || $user->id === $transaction->seller_id;
    }
}
