<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'region',
        'street_name',
        'number',
        'postal_code',
        'comments'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function venues(): HasMany
    {
        return $this->hasMany(Venue::class);
    }
}
