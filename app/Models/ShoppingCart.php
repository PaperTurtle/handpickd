<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ## ShoppingCart Model
 * 
 * > Represents an individual item in a user's shopping cart, including the product, the quantity of that product, and the associated user.
 *
 * ### Properties:
 * - id (bigint, unsigned): Unique identifier for the shopping cart item.
 * - user_id (bigint, unsigned): Foreign key referencing the user who owns the shopping cart item.
 * - product_id (bigint, unsigned): Foreign key referencing the product in the shopping cart.
 * - quantity (int): The quantity of the product in the shopping cart. Defaults to 1.
 * - created_at (timestamp, nullable): Timestamp when the cart item was created. Can be null.
 * - updated_at (timestamp, nullable): Timestamp when the cart item was last updated. Can be null.
 *
 * ### Relationships:
 * - user(): BelongsTo relationship with User. Indicates the user who owns the shopping cart item.
 * - product(): BelongsTo relationship with Product. Indicates the product that is in the shopping cart.
 *
 * ### Accessors:
 * - getTotalPriceAttribute(): Accessor to calculate the total price of the cart item, based on the quantity and the product's price.
 *
 * ### Fillable Attributes:
 * - user_id: Identifier of the user who owns the cart item.
 * - product_id: Identifier of the product in the cart.
 * - quantity: The quantity of the product in the cart.
 */
class ShoppingCart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->product->price;
    }
}
