<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents a review made by a user for a product.
 *
 * @property int $id Unique identifier for the review.
 * @property int $product_id Foreign key referencing the product being reviewed.
 * @property int $user_id Foreign key referencing the user who created the review.
 * @property int $rating Rating given by the user, typically on a scale of 1 to 5.
 * @property string|null $review Text of the review. Can be null.
 * @property \Illuminate\Support\Carbon $created_at Timestamp when the review was created.
 * @property \Illuminate\Support\Carbon $updated_at Timestamp when the review was last updated.
 *
 * @method BelongsTo product() BelongsTo relationship with Product. Indicates the product that is being reviewed.
 * @method BelongsTo user() BelongsTo relationship with User. Indicates the user who made the review.
 *
 * @package App\Models
 */
class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'rating' => 'integer',
    ];

    /**
     * Define the relationship with the product being reviewed.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Define the relationship with the user who made the review.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
