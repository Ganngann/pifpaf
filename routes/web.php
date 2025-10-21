<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;
use App\Models\Ad;

Route::get('/', function () {
    $latestAds = Ad::with('images')->latest()->take(12)->get();
    return view('welcome', ['latestAds' => $latestAds]);
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
});

Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');

Route::get('/search', [AdController::class, 'search'])->name('ads.search');

require __DIR__.'/auth.php';
