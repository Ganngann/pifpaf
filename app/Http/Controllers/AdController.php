<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'condition' => 'required',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ad = auth()->user()->ads()->create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('ads_images', 'public');
                $ad->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('ads.show', $ad);
    }

    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }
}
