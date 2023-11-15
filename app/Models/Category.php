<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ## Category Model
 *
 * Represents a product category in the application. Each category has a name and an optional description.
 *
 * ### Properties:
 * - id (int): Unique identifier for the category.
 * - name (string): Name of the category.
 * - description (string, nullable): Description of the category. Can be null.
 * - created_at (timestamp): Timestamp when the category was created.
 * - updated_at (timestamp): Timestamp when the category was last updated.
 *
 * ### Relationships:
 * - products(): HasMany relationship with Product. Represents all products belonging to this category.
 *
 * ### Fillable Attributes:
 * - name: The name of the category.
 * - description: The description of the category.
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
