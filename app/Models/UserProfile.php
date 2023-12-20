<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents the extended profile of a user.
 *
 * @property int $id Unique identifier for the user profile.
 * @property int $user_id Foreign key referencing the associated user.
 * @property string|null $bio Biography or description of the user. Can be null.
 * @property string|null $profile_picture File path or URL of the user's profile picture. Can be null.
 * @property Carbon $created_at Timestamp when the profile was created.
 * @property Carbon $updated_at Timestamp when the profile was last updated.
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
    protected $fillable = [
        'user_id',
        'bio',
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
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
