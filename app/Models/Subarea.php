<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subarea extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'venue_id',
        'name',
        'width',
        'height',
        'top',
        'bottom'
    ];

    /**
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function seat(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
