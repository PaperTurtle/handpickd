<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * ReviewController handles operations related to creating and updating reviews for products.
 */
class ReviewController extends Controller
{

    /**
     * Store a new review for a product.
     * Validates the request data and creates a new review associated with the authenticated user.
     * Returns a JSON response containing the review data including user information.
     *
     * @param Request $request The request instance containing the review data.
     * @return JsonResponse Returns JSON response with the created review data.
     */
    public function store(Request $request): JsonResponse
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

    /**
     * Update an existing review.
     * Validates the updated review data and updates the review if the authenticated user owns it.
     * Returns a JSON response containing the updated review data.
     *
     * @param Request $request The request instance containing the updated review data.
     * @param Review $review The review instance to be updated.
     * @return JsonResponse Returns JSON response with the updated review data.
     */
    public function update(Request $request, Review $review): JsonResponse
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
