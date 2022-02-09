<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description'];

    /** @return HasMany */
    public function seasons(): HasMany
    {
        return $this->hasMany(Seasons::class);
    }
}
