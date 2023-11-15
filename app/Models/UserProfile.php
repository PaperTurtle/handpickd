<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ## UserProfile Model
 * 
 * Represents the extended profile of a user. It includes additional user information like location, biography, contact information, and profile picture.
 *
 * ### Properties:
 * - id (bigint, unsigned): Unique identifier for the user profile.
 * - user_id (bigint, unsigned): Foreign key referencing the associated user.
 * - location (string, nullable): Location of the user. Can be null.
 * - bio (text, nullable): Biography or description of the user. Can be null.
 * - contact_info (text, nullable): Contact information of the user. Can be null.
 * - profile_picture (string, nullable): File path or URL of the user's profile picture. Can be null.
 * - created_at (timestamp): Timestamp when the profile was created.
 * - updated_at (timestamp): Timestamp when the profile was last updated.
 *
 * ### Relationships:
 * - user(): BelongsTo relationship with User. Represents the user to whom the profile belongs.
 *
 * ### Fillable Attributes:
 * - user_id: Identifier of the associated user.
 * - location: Location of the user.
 * - bio: Biography or description of the user.
 * - contact_info: Contact information of the user.
 * - profile_picture: Path or URL of the user's profile picture.
 */
class UserProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'location',
        'bio',
        'contact_info',
        'profile_picture',
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
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
