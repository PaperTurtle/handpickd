<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ## ProductImage Model
 *
 * Represents an image associated with a product. It includes the image path, alternative text, and a reference to the product.
 *
 * ### Properties:
 * - product_id (bigint, unsigned): Foreign key referencing the product this image is associated with.
 * - image_path (string): File path of the image.
 * - resized_image_path (string): File path of the resized version of the image.
 * - show_image_path (string): File path of the resized (for show blade) version of the image
 * - alt_text (string, nullable): Alternative text for the image, used for accessibility and SEO.
 * - created_at (timestamp): Timestamp when the image was created.
 * - updated_at (timestamp): Timestamp when the image was last updated.
 *
 * ### Relationships:
 * - product(): BelongsTo relationship with Product. Indicates the product to which the image belongs.
 *
 * ### Fillable Attributes:
 * - product_id: Identifier of the associated product.
 * - image_path: Path of the image file.
 * - resized_image_path: Path of the resized image file.
 * - show_image_path: Path of the show image file.
 * - alt_text: Alternative text for the image.
 */
class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        "resized_image_path",
        "show_image_path"
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
