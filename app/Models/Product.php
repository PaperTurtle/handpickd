<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Represents a product in the application.
 *
 * @property int $id Unique identifier for the product.
 * @property int $artisan_id Foreign key referencing the user who created the product.
 * @property int $category_id Foreign key referencing the category of the product.
 * @property string $name Name of the product.
 * @property string $description Description of the product.
 * @property float $price Price of the product, stored as a decimal with two digits after the decimal point.
 * @property int $quantity Quantity of the product available.
 * @property Carbon $created_at Timestamp when the product was created.
 * @property Carbon $updated_at Timestamp when the product was last updated.
 *
 * @method BelongsTo artisan() BelongsTo relationship with User. Indicates the creator of the product.
 * @method BelongsTo category() BelongsTo relationship with Category. Indicates the category of the product.
 * @method HasMany images() HasMany relationship with ProductImage. Represents the images associated with the product.
 * @method HasMany reviews() HasMany relationship with Review. Represents the reviews made for the product.
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'artisan_id',
        'category_id',
        'name',
        'description',
        'price',
        'quantity',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Define the relationship with the artisan who created the product.
     *
     * @return BelongsTo
     */
    public function artisan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'artisan_id');
    }

    /**
     * Define the relationship with the category to which the product belongs.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Define the relationship with product images.
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Define the relationship with product reviews.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Checks if a specific user has already reviewed the product.
     *
     * @param int $userId
     * @return bool
     */
    public function hasUserReviewed(int $userId): bool
    {
        return $this->reviews()->where('user_id', $userId)->exists();
    }

    /**
     * Calculates and returns the average rating of the product based on its reviews.
     *
     * @return float|null
     */
    public function averageRating(): float|null
    {
        return $this->reviews()->avg('rating');
    }

    /**
     * Returns the total number of reviews made for the product.
     *
     * @return int
     */
    public function totalReviews(): int
    {
        return $this->reviews()->count();
    }
}
