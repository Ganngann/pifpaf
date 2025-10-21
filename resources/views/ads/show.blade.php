<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $ad->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Image Gallery -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            @if($ad->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $ad->images->first()->image_path) }}" alt="{{ $ad->title }}" class="rounded-lg w-full">
                                <div class="grid grid-cols-4 gap-2 mt-2">
                                    @foreach($ad->images as $image)
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $ad->title }}" class="rounded-lg cursor-pointer">
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold">{{ $ad->title }}</h3>
                            <p class="text-xl text-gray-800 mt-2">{{ $ad->price }} €</p>
                            <div class="mt-4">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Catégorie: {{ $ad->category }}</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">État: {{ $ad->condition }}</span>
                            </div>
                            <p class="mt-6 text-gray-600">{{ $ad->description }}</p>
                            <div class="mt-6">
                                <p class="text-sm text-gray-500">Vendu par : {{ $ad->user->name }}</p>
                            </div>

                            @auth
                                @if(Auth::id() !== $ad->user_id)
                                    <div class="mt-6">
                                        <form action="{{ route('messages.store', $ad) }}" method="POST">
                                            @csrf
                                            <div class="mt-4">
                                                <x-input-label for="body" :value="__('Message')" />
                                                <textarea id="body" name="body" class="block mt-1 w-full" required autofocus></textarea>
                                            </div>
                                            <div class="flex items-center justify-end mt-4">
                                                <x-primary-button>
                                                    {{ __('Contacter le vendeur') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
