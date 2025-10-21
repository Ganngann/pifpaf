<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageAnalysisServiceInterface;

class VisionController extends Controller
{
    protected $imageAnalysisService;

    public function __construct(ImageAnalysisServiceInterface $imageAnalysisService)
    {
        $this->imageAnalysisService = $imageAnalysisService;
    }

    public function analyzeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:4096',
        ]);

        $imageContent = file_get_contents($request->file('image')->getRealPath());
        $suggestions = $this->imageAnalysisService->getSuggestions($imageContent);

        if (isset($suggestions['error'])) {
            return response()->json(['error' => $suggestions['error']], 500);
        }

        return response()->json($suggestions);
    }
}
