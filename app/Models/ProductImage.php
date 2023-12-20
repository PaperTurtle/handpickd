<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents an image associated with a product.
 *
 * @property int $id Unique identifier for the product image.
 * @property int $product_id Foreign key referencing the product this image is associated with.
 * @property string $image_path File path of the image.
 * @property string $resized_image_path File path of the resized version of the image.
 * @property string $show_image_path File path of the resized (for show blade) version of the image.
 * @property string|null $alt_text Alternative text for the image, used for accessibility and SEO.
 * @property Carbon $created_at Timestamp when the image was created.
 * @property Carbon $updated_at Timestamp when the image was last updated.
 *
 * @package App\Models
 */
class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        "resized_image_path",
        "show_image_path",
        "thumbnail_image_path"
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
     * Define the relationship with the product to which the image belongs.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
