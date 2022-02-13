<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Series extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description', 'cover'];


    public function getSeriesCoverAttribute()
    {
        if ($this->cover) {
            return Storage::url($this->cover);
        }

        return Storage::url('series/noimage.png');
    }

    /** @return HasMany */
    public function seasons(): HasMany
    {
        return $this->hasMany(Seasons::class);
    }
}
