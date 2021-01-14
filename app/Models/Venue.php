<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Venue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'address_id',
        'subareas',
        'img_url'
    ];

    /**
     * A Venue has been created by a User.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * At a Venue there can be many Events.
     *
     * @return HasMany
     */
    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * A Venue has one and only physical address.
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'address_id');
    }

    /**
     * A Venue can have many Subareas more than one rooms, floors, etc.
     *
     * @return HasMany
     */
    public function subarea(): HasMany
    {
        return $this->hasMany(Subarea::class);
    }
}
