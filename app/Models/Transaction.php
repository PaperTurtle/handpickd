<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ## Transaction Model
 * 
 * > Represents a transaction in the system, linking a buyer (user) and a product, along with the quantity, total price, and status of the transaction.
 *
 * ### Properties:
 * - id (bigint, unsigned): Unique identifier for the transaction.
 * - buyer_id (bigint, unsigned): Foreign key referencing the user who is the buyer in the transaction.
 * - product_id (bigint, unsigned): Foreign key referencing the product involved in the transaction.
 * - quantity (int): The quantity of the product involved in the transaction.
 * - total_price (decimal, 10,2): Total price of the transaction.
 * - status (string): The status of the transaction (e.g., pending, completed).
 * - created_at (timestamp): Timestamp when the transaction was created.
 * - updated_at (timestamp): Timestamp when the transaction was last updated.
 *
 * ### Relationships:
 * - buyer(): BelongsTo relationship with User. Represents the buyer in the transaction.
 * - product(): BelongsTo relationship with Product. Represents the product involved in the transaction.
 *
 * ### Fillable Attributes:
 * - buyer_id: Identifier of the buyer (user) in the transaction.
 * - product_id: Identifier of the product in the transaction.
 * - quantity: The quantity of the product in the transaction.
 * - total_price: Total price of the transaction.
 * - status: The status of the transaction.
 */
class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'buyer_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the buyer that made the transaction.
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Get the product that was transacted.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
