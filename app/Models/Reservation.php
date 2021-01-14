<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'event_id',
        'venue_id',
        'end_time'
    ];

    /**
     * A Reservation is for an Event.
     *
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    /**
     * A Reservation is for a Seat.
     *
     * @return HasOne
     */
    public function seat(): HasOne
    {
        return $this->hasOne(Seat::class, 'venue_id');
    }
}
