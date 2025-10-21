<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes annonces') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($ads->isEmpty())
                        <p>Vous n'avez pas encore créé d'annonce.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($ads as $ad)
                                <a href="{{ route('ads.show', $ad) }}" class="block">
                                    <div class="border rounded-lg overflow-hidden">
                                        @if($ad->images->isNotEmpty())
                                            <img src="{{ asset('storage/' . $ad->images->first()->image_path) }}" alt="{{ $ad->title }}" class="h-48 w-full object-cover">
                                        @else
                                            <div class="h-48 w-full bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-500">Pas d'image</span>
                                            </div>
                                        @endif
                                        <div class="p-4">
                                            <h3 class="font-bold">{{ $ad->title }}</h3>
                                            <p class="text-gray-600">{{ $ad->price }} €</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
