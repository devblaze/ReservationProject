<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory, Searchable;

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

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = $this->transform($array);

        $array['name'] = $this->name;
        $array['type'] = $this->type;
        $array['location'] = $this->venue->address->city->name . ", " . $this->venue->address->city->country;
        $array['country'] = $this->venue->address->city->country;

        return $array;
    }

    public function safeDelete(User $user): array
    {
        if ($user->id === $this->user_id || $user->roles()->first()->label === "Admin") {
            $noun = $user->id === $this->user_id ? 'your' : 'the';
            $this->delete();
            return [
                'type' => 'success',
                'message' => 'You have successfully deleted ' . $noun . ' Event.'
            ];
        }

        return [
            'type' => 'danger',
            'message' => 'You do not have permission to do this!'
        ];
    }

    public function switchEventStatus(User $user): array
    {
        if ($user->id === $this->user_id || $user->roles()->first()->label === "Admin") {
            $this->status = $this->status === "active" ? "canceled" : "active";
            $this->save();
            return [
                'type' => 'success',
                'message' => 'Your event has been switched to ' . $this->status . ' status.'
            ];
        }

        return [
            'type' => 'danger',
            'message' => 'You do not have permission to do this!'
        ];
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

    /**
     * An event has one sub area that belongs to.
     *
     * @return HasOne
     */
    public function subarea(): HasOne
    {
        return $this->hasOne(Subarea::class, 'subarea_id');
    }
}
