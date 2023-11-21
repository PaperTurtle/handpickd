<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents a transaction in the system, linking a buyer (user) and a product, along with the quantity, total price, and status of the transaction.
 *
 * @property int $id Unique identifier for the transaction.
 * @property int $buyer_id Foreign key referencing the user who is the buyer in the transaction.
 * @property int $product_id Foreign key referencing the product involved in the transaction.
 * @property int $quantity The quantity of the product involved in the transaction.
 * @property float $total_price Total price of the transaction, stored as a decimal with two digits after the decimal point.
 * @property string $status The status of the transaction (e.g., pending, completed).
 * @property \Illuminate\Support\Carbon $created_at Timestamp when the transaction was created.
 * @property \Illuminate\Support\Carbon $updated_at Timestamp when the transaction was last updated.
 *
 * @method BelongsTo buyer() BelongsTo relationship with User. Represents the buyer in the transaction.
 * @method BelongsTo product() BelongsTo relationship with Product. Represents the product involved in the transaction.
 *
 * @package App\Models
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
     *
     * @return BelongsTo
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Get the product that was transacted.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
