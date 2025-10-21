<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the conversation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Conversation $conversation)
    {
        return $user->id === $conversation->buyer_id || $user->id === $conversation->seller_id;
    }

    /**
     * Determine whether the user can update the conversation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Conversation $conversation)
    {
        return $user->id === $conversation->buyer_id || $user->id === $conversation->seller_id;
    }
}
