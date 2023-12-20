<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents an individual item in a user's shopping cart.
 *
 * @property int $id Unique identifier for the shopping cart item.
 * @property int $user_id Foreign key referencing the user who owns the shopping cart item.
 * @property int $product_id Foreign key referencing the product in the shopping cart.
 * @property int $quantity The quantity of the product in the shopping cart. Defaults to 1.
 * @property Carbon|null $created_at Timestamp when the cart item was created. Can be null.
 * @property Carbon|null $updated_at Timestamp when the cart item was last updated. Can be null.
 * @property-read float|int $total_price Accessor to calculate the total price of the cart item, based on the quantity and the product's price.
 *
 * @package App\Models
 */
class ShoppingCart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /**
     * Define the relationship with the user who owns the cart item.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the product in the cart.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor to calculate the total price of the cart item.
     *
     * @return float|int
     */
    public function getTotalPriceAttribute(): float|int
    {
        return $this->quantity * $this->product->price;
    }

    /**
     * Check if the shopping cart is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->where('user_id', $this->user_id)->count() == 0;
    }
}
