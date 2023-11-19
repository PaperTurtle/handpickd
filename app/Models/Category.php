<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Represents a product category in the application.
 *
 * @property int $id Unique identifier for the category.
 * @property string $name Name of the category.
 * @property string|null $description Description of the category. Can be null.
 * @property \Illuminate\Support\Carbon $created_at Timestamp when the category was created.
 * @property \Illuminate\Support\Carbon $updated_at Timestamp when the category was last updated.
 *
 * @method HasMany products() HasMany relationship with Product. Represents all products belonging to this category.
 *
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Define the relationship with products.
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
