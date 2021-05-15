<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Event extends Model
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
        'type',
        'venue_id',
        'end_time'
    ];

    public function safeDelete(Request $request): void
    {
        if (!$request) {
            session()->put('danger', 'You do not have permission to do this.');
        }

        session()->put([
            'type' => 'success',
            'message' => 'You have successfully deleted your Event!'
        ]);
    }

    /**
     * An Event was created by a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * An Event must have/belong to a Venue (physical place).
     *
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
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
