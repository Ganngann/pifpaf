@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Complete Your Payment</h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-2">{{ $ad->title }}</h2>
        <p class="text-lg">{{ number_format($offer_price, 2) }} €</p>

        <form action="{{ route('payment.store', $ad) }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="amount" value="{{ $offer_price }}">

            {{-- Simulate a payment form --}}
            <div class="mt-4">
                <x-input-label for="card_number" :value="__('Card Number')" />
                <x-text-input id="card_number" name="card_number" type="text" class="block mt-1 w-full" value="**** **** **** 4242" disabled />
            </div>

            <div class="mt-4">
                <x-input-label for="expiry_date" :value="__('Expiry Date')" />
                <x-text-input id="expiry_date" name="expiry_date" type="text" class="block mt-1 w-full" value="12/26" disabled />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Pay Now') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
