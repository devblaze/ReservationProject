<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        'postal_code',
        'comments'
    ];

    public static function validateAddress(Request $data): array
    {
        return $data->validate([
            'street_name' => 'required',
            'postal_code' => 'required',
            'region'      => 'required'
        ]);
    }
}
