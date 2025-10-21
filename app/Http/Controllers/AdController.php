<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Services\ImageAnalysisService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
    public function analyzeImage(Request $request, ImageAnalysisService $imageAnalysisService)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        try {
            $path = $request->file('image')->getRealPath();
            $suggestions = $imageAnalysisService->analyzeImage($path);

            return response()->json($suggestions);
        } catch (\Exception $e) {
            Log::error('Google Vision API error: ' . $e->getMessage());
            return response()->json(['error' => 'Image analysis failed.'], 500);
        }
    }
    public function index()
    {
        $ads = auth()->user()->ads()->latest()->get();
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        Log::info('Ad creation request received.', $request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                Log::info("File {$key}:", [
                    'isValid' => $file->isValid(),
                    'getClientOriginalName' => $file->getClientOriginalName(),
                    'getClientMimeType' => $file->getClientMimeType(),
                    'getError' => $file->getError(),
                ]);
            }
        } else {
            Log::warning('No files found in request.');
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'condition' => 'required',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed.', $validator->errors()->toArray());
            return back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $ad = auth()->user()->ads()->create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('ads_images', 'public');
                $ad->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('ads.show', $ad)->with('status', 'Annonce créée avec succès !');
    }

    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }
}
