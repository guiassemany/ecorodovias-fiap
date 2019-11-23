<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficialVehicleAllocation extends Model
{

    public function officialVehicle()
    {
        return $this->belongsTo(OfficialVehicle::class, 'VIACODIGO', 'VIACODIGO');
    }
}
