<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permission(): belongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    public function allowTo($permission): void
    {
        $this->permission()->save($permission);
    }
}
