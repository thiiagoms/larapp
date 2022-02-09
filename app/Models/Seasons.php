<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Seasons extends Model
{
    public $timestamps = false;

    protected $fillable = ['seasons_quantity'];

    /** @return BelongsTo */
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    /** @return HasMany */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episodes::class);
    }

    /** @return bool */
    public function watchedEpisodes(): bool
    {
        return $this->episodes->filter(function (Episodes $episode) {
            return $episode->watched;
        });
    }
}
