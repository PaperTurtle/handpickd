<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ## Product Model
 *
 * Represents a product in the application. Each product is created by an artisan and belongs to a specific category.
 * It includes details like name, description, price, and quantity.
 *
 * ### Properties:
 * - id (bigint): Unique identifier for the product.
 * - artisan_id (bigint): Foreign key referencing the user who created the product.
 * - category_id (int): Foreign key referencing the category of the product.
 * - name (string): Name of the product.
 * - description (string): Description of the product.
 * - price (decimal, 10,2): Price of the product, stored as a decimal with two digits after the decimal point.
 * - quantity (int): Quantity of the product available.
 * - created_at (timestamp): Timestamp when the product was created.
 * - updated_at (timestamp): Timestamp when the product was last updated.
 *
 * ### Relationships:
 * - artisan(): BelongsTo relationship with User. Indicates the creator of the product.
 * - category(): BelongsTo relationship with Category. Indicates the category of the product.
 * - images(): HasMany relationship with ProductImage. Represents the images associated with the product.
 * - reviews(): HasMany relationship with Review. Represents the reviews made for the product.
 *
 * ### Methods:
 * - hasUserReviewed($userId): Checks if a specific user has already reviewed the product.
 *
 * ### Fillable Attributes:
 * - artisan_id: The identifier of the user who created the product.
 * - category_id: The identifier of the category to which the product belongs.
 * - name: The name of the product.
 * - description: The description of the product.
 * - price: The price of the product.
 * - quantity: The available quantity of the product.
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'artisan_id',
        'category_id',
        'name',
        'description',
        'price',
        'quantity',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'artisan_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function hasUserReviewed($userId): bool
    {
        return $this->reviews()->where('user_id', $userId)->exists();
    }
}
