<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents the extended profile of a user.
 *
 * @property int $id Unique identifier for the user profile.
 * @property int $user_id Foreign key referencing the associated user.
 * @property string|null $location Location of the user. Can be null.
 * @property string|null $bio Biography or description of the user. Can be null.
 * @property string|null $contact_info Contact information of the user. Can be null.
 * @property string|null $profile_picture File path or URL of the user's profile picture. Can be null.
 * @property \Illuminate\Support\Carbon $created_at Timestamp when the profile was created.
 * @property \Illuminate\Support\Carbon $updated_at Timestamp when the profile was last updated.
 *
 * @method BelongsTo user() BelongsTo relationship with User. Represents the user to whom the profile belongs.
 *
 * @package App\Models
 */
class UserProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected array $fillable = [
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
    protected array $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the profile.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
