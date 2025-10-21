@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h1>

    <div class="mb-8 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
        <form action="{{ route('ads.search') }}" method="GET">
            <input type="hidden" name="query" value="{{ $query }}">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="category" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Category</label>
                    <select name="category" id="category" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ ucfirst($category) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="condition" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Condition</label>
                    <select name="condition" id="condition" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">All</option>
                        @foreach ($conditions as $condition)
                            <option value="{{ $condition }}" {{ request('condition') == $condition ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $condition)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="min_price" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Min Price</label>
                    <input type="number" name="min_price" id="min_price" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="0">
                </div>
                <div>
                    <label for="max_price" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Max Price</label>
                    <input type="number" name="max_price" id="max_price" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="1000">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($ads as $ad)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('ads.show', $ad) }}">
                    @if ($ad->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $ad->images->first()->image_path) }}" alt="{{ $ad->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold">{{ $ad->title }}</h3>
                        <p class="text-gray-600">{{ number_format($ad->price, 2) }} €</p>
                    </div>
                </a>
            </div>
        @empty
            <p>No ads found matching your search criteria.</p>
        @endforelse
    </div>
</div>
@endsection
