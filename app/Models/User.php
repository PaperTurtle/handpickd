<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Represents a user in the system.
 *
 * @property int $id Unique identifier for the user.
 * @property string $name Name of the user.
 * @property string $email Email address of the user.
 * @property Carbon|null $email_verified_at Timestamp when the user's email was verified. Can be null.
 * @property string $password Password of the user (hashed).
 * @property string|null $remember_token Token for the user's session. Can be null.
 * @property Carbon|null $created_at Timestamp when the user account was created. Can be null.
 * @property Carbon|null $updated_at Timestamp when the user account was last updated. Can be null.
 * @property bool $isArtisan Flag indicating whether the user is an artisan.
 *
 * @method HasOne profile() HasOne relationship with UserProfile. Represents the user's profile.
 * @method HasMany products() HasMany relationship with Product. Represents products created by the user (if the user is an artisan).
 * @method HasMany reviews() HasMany relationship with Review. Represents reviews written by the user.
 * @method HasMany transactions() HasMany relationship with Transaction. Represents transactions where the user is the buyer.
 *
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'isArtisan',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user profile associated with the user.
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the products created by the user (artisan).
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'artisan_id');
    }

    /**
     * Get the reviews written by the user.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the transactions where the user is the buyer.
     *
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'buyer_id');
    }

    protected static function booted()
    {
        static::created(function ($user) {
            UserProfile::create([
                'user_id' => $user->id,
            ]);
        });
    }
}
