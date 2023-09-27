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

//FastCGI sent in stderr: "PHP message: Xdebug: [Step Debug] Time-out connecting to debugging client, waited: 200 ms.
//Tried: host.docker.internal:9003 (through xdebug.client_host/xdebug.client_port) :-(PHP message: PHP Parse error:  syntax error, unexpected '=' in /var/www/vendor/symfony/string/Resources/functions.php on line 34"
//while reading response header from upstream, client: 172.25.0.1, server: localhost, request: "GET / HTTP/1.1", upstream: "fastcgi://172.25.0.5:9000", host: "localhost"
}
