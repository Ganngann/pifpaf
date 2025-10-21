<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $condition = $request->input('condition');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $adsQuery = Ad::where('status', 'available');

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

        if ($minPrice) {
            $adsQuery->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $adsQuery->where('price', '<=', $maxPrice);
        }

        $ads = $adsQuery->with('images')->latest()->paginate(12);

        return view('search.index', [
            'ads' => $ads,
            'query' => $query,
        ]);
    }
}
