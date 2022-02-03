<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description'];

    public function seasons()
    {
        return $this->hasMany(Seasons::class);
    }
}
