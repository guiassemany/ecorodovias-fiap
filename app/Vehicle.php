<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function ocurrences()
    {
        return $this->belongsTo(Occurrence::class);
    }
}
