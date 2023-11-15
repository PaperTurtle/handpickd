<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ## Review Model
 *
 * Represents a review made by a user for a product. Each review includes a rating and an optional text review.
 *
 * ### Properties:
 * - id (bigint, unsigned): Unique identifier for the review.
 * - product_id (bigint, unsigned): Foreign key referencing the product being reviewed.
 * - user_id (bigint, unsigned): Foreign key referencing the user who created the review.
 * - rating (int): Rating given by the user, typically on a scale of 1 to 5.
 * - review (text, nullable): Text of the review. Can be null.
 * - created_at (timestamp): Timestamp when the review was created.
 * - updated_at (timestamp): Timestamp when the review was last updated.
 *
 * ### Relationships:
 * - product(): BelongsTo relationship with Product. Indicates the product that is being reviewed.
 * - user(): BelongsTo relationship with User. Indicates the user who made the review.
 *
 * ### Fillable Attributes:
 * - product_id: Identifier of the product being reviewed.
 * - user_id: Identifier of the user who wrote the review.
 * - rating: Numeric rating given to the product.
 * - review: Text content of the review.
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'rating' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
