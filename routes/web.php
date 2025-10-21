<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;
use App\Models\Ad;

Route::get('/', function () {
    $latestAds = Ad::where('status', 'available')->with('images')->latest()->take(12)->get();
    return view('welcome', compact('latestAds'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ads routes
    Route::get('/ads', [AdController::class, 'index'])->name('ads.index');
    Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
    Route::post('/ads/analyze-image', [AdController::class, 'analyzeImage'])->name('ads.analyze');
});

use App\Http\Controllers\SearchController;

Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// Public profile route
Route::get('/profiles/{user}', [\App\Http\Controllers\PublicProfileController::class, 'show'])->name('profiles.show');

// Messaging routes
Route::middleware('auth')->group(function () {
    Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{conversation}', [\App\Http\Controllers\MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{ad}', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
    Route::post('/messages/offer/{conversation}', [\App\Http\Controllers\MessageController::class, 'makeOffer'])->name('messages.offer.make');
    Route::post('/messages/offer/respond/{message}', [\App\Http\Controllers\MessageController::class, 'respondToOffer'])->name('messages.offer.respond');

    // Payment routes
    Route::get('/payment/{ad}', [\App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/{ad}', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');

    // Rating routes
    Route::get('/ratings/create/{transaction}', [\App\Http\Controllers\RatingController::class, 'create'])->name('ratings.create');
    Route::post('/ratings/{transaction}', [\App\Http\Controllers\RatingController::class, 'store'])->name('ratings.store');

    // Transaction routes
    Route::get('/transactions/{transaction}', [\App\Http\Controllers\TransactionController::class, 'show'])->name('transactions.show');
});

require __DIR__.'/auth.php';
