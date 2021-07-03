<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->roles()->where('label', 'Admin')->exists();
    }

    public function isVenueAdmin(): bool
    {
        return $this->roles()->where('label', 'VenueAdmin')->exists();
    }

    public function isEventAdmin(): bool
    {
        return $this->roles()->where('label', 'EventAdmin')->exists();
    }

    /**
     * A User has one or more roles. (ex. Nick is [User, Author, Moderator])
     *
     * @return BelongsToMany
     */
    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Assign and save the roles of the user.
     *
     * @param Role $role
     */
    public function assignRole(Role $role): void
    {
        $this->roles()->save($role);
    }

    /**
     * A User can own (have created) many Venues.
     *
     * @return HasMany
     */
    public function venues(): HasMany
    {
        return $this->hasMany(Venue::class);
    }

    /**
     * A User can have many Reservations.
     *
     * @return HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * A User can own (have created) many Events.
     *
     * @return HasMany
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

}
