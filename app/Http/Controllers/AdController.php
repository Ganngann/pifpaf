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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $condition = $request->input('condition');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        $adsQuery = Ad::query();

        if ($query) {
            $adsQuery->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            });
        }

        if ($category) {
            $adsQuery->where('category', $category);
        }

        if ($condition) {
            $adsQuery->where('condition', $condition);
        }

        if ($min_price) {
            $adsQuery->where('price', '>=', $min_price);
        }

        if ($max_price) {
            $adsQuery->where('price', '<=', $max_price);
        }

        $ads = $adsQuery->get();

        $categories = Ad::select('category')->distinct()->get()->pluck('category');
        $conditions = Ad::select('condition')->distinct()->get()->pluck('condition');

        return view('ads.results', [
            'ads' => $ads,
            'query' => $query,
            'categories' => $categories,
            'conditions' => $conditions,
        ]);
    }
}
