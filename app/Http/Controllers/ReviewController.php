<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        $review = Review::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return response()->json($review->load('user'));
    }

    public function update(Request $request, Review $review)
    {
        if ($review->user_id !== auth()->id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);

        $review->update($validatedData);

        return response()->json($review);
    }
}
