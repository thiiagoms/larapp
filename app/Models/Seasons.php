<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    public $timestamps = false;

    protected $fillable = ['seasons_quantity'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episodes::class);
    }

    public function watchedEpisodes()
    {
        return $this->episodes->filter(function (Episodes $episode) {
            return $episode->watched;
        });
    }
}
