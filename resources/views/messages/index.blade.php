@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Inbox</h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($conversations as $conversation)
                <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <a href="{{ route('messages.show', $conversation) }}">
                        <div class="flex justify-between">
                            <div>
                                <p class="font-semibold">{{ $conversation->ad->title }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    @if ($conversation->buyer_id === Auth::id())
                                        Conversation with {{ $conversation->seller->name }}
                                    @else
                                        Conversation with {{ $conversation->buyer->name }}
                                    @endif
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $conversation->messages->last()->created_at->diffForHumans() }}</p>
                                {{-- Add unread message indicator later --}}
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <li class="p-4">
                    <p>You have no messages.</p>
                </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
