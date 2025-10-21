<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Résultats de recherche pour : "{{ $query }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filters -->
                    <form method="GET" action="{{ route('search.index') }}" class="mb-8 p-4 border rounded-lg">
                        <input type="hidden" name="query" value="{{ $query }}">
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <!-- Category Filter -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                                <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Toutes</option>
                                    <option value="electronics" {{ request('category') == 'electronics' ? 'selected' : '' }}>Électronique</option>
                                    <option value="furniture" {{ request('category') == 'furniture' ? 'selected' : '' }}>Mobilier</option>
                                    <option value="clothing" {{ request('category') == 'clothing' ? 'selected' : '' }}>Vêtements</option>
                                    <option value="books" {{ request('category') == 'books' ? 'selected' : '' }}>Livres</option>
                                    <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Autre</option>
                                </select>
                            </div>
                            <!-- Condition Filter -->
                            <div>
                                <label for="condition" class="block text-sm font-medium text-gray-700">État</label>
                                <select id="condition" name="condition" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Tous</option>
                                    <option value="new" {{ request('condition') == 'new' ? 'selected' : '' }}>Neuf</option>
                                    <option value="like_new" {{ request('condition') == 'like_new' ? 'selected' : '' }}>Comme neuf</option>
                                    <option value="good" {{ request('condition') == 'good' ? 'selected' : '' }}>Bon état</option>
                                    <option value="used" {{ request('condition') == 'used' ? 'selected' : '' }}>Usé</option>
                                </select>
                            </div>
                            <!-- Price Filter -->
                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Prix</label>
                                <div class="mt-1 flex space-x-2">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="self-end">
                                <button type="submit" class="w-full justify-center inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Filtrer
                                </button>
                            </div>
                        </div>
                    </form>

                    @if($ads->count())
                        <p class="mb-6 text-gray-700">{{ $ads->total() }} annonce(s) trouvée(s).</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach ($ads as $ad)
                                <div class="bg-gray-50 rounded-lg shadow p-4 flex flex-col justify-between">
                                    <div>
                                        <a href="{{ route('ads.show', $ad) }}">
                                            @if($ad->images->isNotEmpty())
                                                <img src="{{ asset('storage/' . $ad->images->first()->image_path) }}" alt="{{ $ad->title }}" class="rounded-md h-48 w-full object-cover">
                                            @else
                                                <div class="rounded-md h-48 w-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-500">Aucune image</span>
                                                </div>
                                            @endif
                                            <h3 class="font-bold text-lg mt-2">{{ $ad->title }}</h3>
                                        </a>
                                        <p class="text-gray-600 mt-1">{{ Str::limit($ad->description, 50) }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <span class="font-semibold text-indigo-600 text-xl">{{ number_format($ad->price, 2, ',', ' ') }} €</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $ads->appends(request()->query())->links() }}
                        </div>

                    @else
                        <p class="text-center text-gray-500">
                            Aucun résultat trouvé pour votre recherche. Essayez avec d'autres mots-clés.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
