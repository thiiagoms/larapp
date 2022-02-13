<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episodes extends Model
{
    public $timestamps = false;

    protected $fillable = ['episodes_quantity', 'watched'];

    /** @return BelongsTo */
    public function seasons(): BelongsTo
    {
        return $this->belongsTo(Seasons::class);
    }
}
