<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil de ') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>Nom d'utilisateur:</strong> {{ $user->name }}</p>
                    <p><strong>Membre depuis:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                    <p><strong>Note moyenne:</strong> {{ number_format($averageRating, 1) }} / 5</p>

                    <h3 class="font-semibold text-lg mt-6">Annonces actives</h3>
                    @if($user->ads->count() > 0)
                        <ul>
                            @foreach($user->ads as $ad)
                                <li><a href="{{ route('ads.show', $ad) }}">{{ $ad->title }}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p>Cet utilisateur n'a aucune annonce active.</p>
                    @endif

                    <h3 class="font-semibold text-lg mt-6">Évaluations</h3>
                    @if($user->ratingsReceived->count() > 0)
                        <ul>
                            @foreach($user->ratingsReceived as $rating)
                                <li>
                                    <p><strong>Note:</strong> {{ $rating->rating }} / 5</p>
                                    <p><strong>Commentaire:</strong> {{ $rating->comment }}</p>
                                    <p><em>par {{ $rating->rater->name }} le {{ $rating->published_at->format('d/m/Y') }}</em></p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Cet utilisateur n'a pas encore reçu d'évaluation.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
