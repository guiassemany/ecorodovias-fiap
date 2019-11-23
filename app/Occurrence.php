<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{

    protected $primaryKey = 'OCOCODIGO';

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'OCOCODIGO', 'OCOCODIGO');
    }

    public function officialVehiclesAllocations()
    {
        return $this->hasMany(OfficialVehicleAllocation::class, 'OCOCODIGO', 'OCOCODIGO');
    }
}
