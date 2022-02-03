<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    public $timestamps = false;

    protected $fillable = ['episodes_quantity', 'watched'];

    /**
     * @return mixed
     */
    public function seasons()
    {
        return $this->belongsTo(Seasons::class);
    }
}
