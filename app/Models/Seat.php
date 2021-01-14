<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Seat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subarea_id',
        'x',
        'y',
        'status'
    ];

    /**
     * A Seat has/belongs to a Subarea.
     *
     * @return BelongsTo
     */
    public function subarea(): BelongsTo
    {
        return $this->belongsTo(Subarea::class);
    }
}
