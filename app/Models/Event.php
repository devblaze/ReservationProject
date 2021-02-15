<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'event_type',
        'venue_id',
        'end_time'
    ];

    /**
     * An Event must have/belong to a Venue (physical place).
     *
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * An event can have more than one reservations.
     *
     * @return HasMany
     */
    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
