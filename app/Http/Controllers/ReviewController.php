<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Http\JsonResponse;

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
     * @param StoreReviewRequest $request The request instance containing the review data.
     * @return JsonResponse Returns JSON response with the created review data.
     */
    public function store(StoreReviewRequest $request): JsonResponse
    {
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
     * @param UpdateReviewRequest $request The request instance containing the updated review data.
     * @param Review $review The review instance to be updated.
     * @return JsonResponse Returns JSON response with the updated review data.
     */
    public function update(UpdateReviewRequest $request, Review $review): JsonResponse
    {
        $review->update($request->validated());

        return response()->json($review);
    }
}
