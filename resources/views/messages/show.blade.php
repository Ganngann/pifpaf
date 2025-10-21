@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Conversation about "{{ $conversation->ad->title }}"</h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <div class="mb-4">
            @foreach ($conversation->messages as $message)
                <div class="mb-4">
                    <p class="font-semibold"><a href="{{ route('profiles.show', $message->user) }}">{{ $message->user->name }}</a> <span class="text-sm text-gray-500 dark:text-gray-400">{{ $message->created_at->diffForHumans() }}</span></p>
                    <p>{{ $message->body }}</p>
                    @if ($message->offer_price)
                        <div class="mt-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <p class="text-lg font-bold">Offer: {{ number_format($message->offer_price, 2) }} €</p>
                            @if ($conversation->seller_id === Auth::id() && $message->offer_status === null)
                                <div class="mt-2">
                                    <form action="{{ route('messages.offer.respond', $message) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="accepted">
                                        <x-primary-button>Accept</x-primary-button>
                                    </form>
                                    <form action="{{ route('messages.offer.respond', $message) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="declined">
                                        <x-danger-button>Decline</x-danger-button>
                                    </form>
                                </div>
                            @elseif ($message->offer_status)
                                <p class="mt-2">Offer {{ $message->offer_status }}</p>
                                @if ($message->offer_status === 'accepted' && $conversation->buyer_id === Auth::id())
                                    <div class="mt-2">
                                        <a href="{{ route('payment.create', ['ad' => $conversation->ad, 'offer_price' => $message->offer_price]) }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Pay Now
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div>
            <form action="{{ route('messages.store', $conversation->ad) }}" method="POST">
                @csrf
                <div class="mt-4">
                    <x-input-label for="body" :value="__('Reply')" />
                    <textarea id="body" name="body" class="block mt-1 w-full" required autofocus></textarea>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Send') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        @if ($conversation->buyer_id === Auth::id())
        <div class="mt-6">
            <h3 class="text-lg font-bold mb-2">Make an Offer</h3>
            <form action="{{ route('messages.offer.make', $conversation) }}" method="POST">
                @csrf
                <div class="mt-4">
                    <x-input-label for="offer_price" :value="__('Price')" />
                    <x-text-input id="offer_price" name="offer_price" type="number" class="block mt-1 w-full" required />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Make Offer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
