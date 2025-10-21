<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisionController;

Route::middleware('auth:sanctum')->post('/analyze-image', [VisionController::class, 'analyzeImage']);
