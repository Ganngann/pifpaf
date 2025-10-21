<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laisser une évaluation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('ratings.store', $transaction) }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="rating" :value="__('Note (sur 5)')" />
                            <x-text-input id="rating" name="rating" type="number" min="1" max="5" class="block mt-1 w-full" required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="comment" :value="__('Commentaire')" />
                            <textarea id="comment" name="comment" class="block mt-1 w-full"></textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Envoyer l\'évaluation') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
