<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Represents an order in the application.
 *
 * @property int $id Unique identifier for the order.
 * @property int $buyer_id Foreign key referencing the user who placed the order.
 * @property string $order_uuid Unique UUID for the order.
 * @property float $total_price Total price of the order, stored as a decimal with two digits after the decimal point.
 * @property \Illuminate\Support\Carbon $created_at Timestamp when the order was created.
 * @property \Illuminate\Support\Carbon $updated_at Timestamp when the order was last updated.
 * @property-read bool $is_complete Indicates whether all transactions for the order have the "sent" status.
 *
 * @method BelongsTo buyer() BelongsTo relationship with User. Indicates the user who placed the order.
 * @method HasMany transactions() HasMany relationship with Transaction. Represents the transactions associated with the order.
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'buyer_id',
        'total_price',
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
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_uuid = (string) Str::uuid();
        });
    }

    /**
     * Get the buyer that placed the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Get the transactions for the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Determine if the order is complete (all transactions have the "sent" status).
     *
     * @return bool
     */
    public function getIsCompleteAttribute()
    {
        return $this->transactions->every(function ($transaction) {
            return $transaction->status === 'sent';
        });
    }

    /**
     * Get the total price of all transactions for this order.
     *
     * @return string
     */
    public function getTotalPriceAttribute()
    {
        return $this->transactions->sum('total_price');
    }
}
