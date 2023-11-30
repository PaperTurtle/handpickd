<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * ## User Model
 *
 * Represents a user in the system. It includes basic user information like name, email, and password.
 * The model also links to various aspects related to the user such as their profile, products they've created, reviews they've written, and transactions they're involved in.
 *
 * ### Properties:
 * - id (bigint, unsigned): Unique identifier for the user.
 * - name (string): Name of the user.
 * - email (string): Email address of the user.
 * - email_verified_at (timestamp, nullable): Timestamp when the user's email was verified. Can be null.
 * - password (string): Password of the user (hashed).
 * - remember_token (string, nullable): Token for the user's session.
 * - created_at (timestamp, nullable): Timestamp when the user account was created. Can be null.
 * - updated_at (timestamp, nullable): Timestamp when the user account was last updated. Can be null.
 * - isArtisan (tinyint, boolean): Flag indicating whether the user is an artisan.
 *
 * ### Relationships:
 * - profile(): HasOne relationship with UserProfile. Represents the user's profile.
 * - products(): HasMany relationship with Product. Represents products created by the user (if the user is an artisan).
 * - reviews(): HasMany relationship with Review. Represents reviews written by the user.
 * - transactions(): HasMany relationship with Transaction. Represents transactions where the user is the buyer.
 *
 * ### Fillable Attributes:
 * - name: Name of the user.
 * - email: Email address of the user.
 * - password: Password of the user.
 *
 * ### Hidden Attributes:
 * - password: User's password (hashed).
 * - remember_token: Token used for remember me functionality.
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
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the products created by the user (artisan).
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'artisan_id');
    }

    /**
     * Get the reviews written by the user.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the transactions where the user is the buyer.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'buyer_id');
    }
}
