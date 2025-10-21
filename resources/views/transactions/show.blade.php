<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction pour ') }} {{ $transaction->ad->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>Annonce:</strong> {{ $transaction->ad->title }}</p>
                    <p><strong>Vendeur:</strong> {{ $transaction->ad->user->name }}</p>
                    <p><strong>Acheteur:</strong> {{ $transaction->buyer->name }}</p>
                    <p><strong>Prix:</strong> {{ $transaction->amount }} €</p>
                    <p><strong>Status:</strong> {{ $transaction->status }}</p>

                    @if($transaction->status === 'completed')
                        <div class="mt-6">
                            <a href="{{ route('ratings.create', $transaction) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Laisser une évaluation
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
