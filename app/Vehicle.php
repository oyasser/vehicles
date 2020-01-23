<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = ['id'];

    public function fuel()
    {
        return $this->hasMany(FuelEntry::class,'vehicle_id');
    }


    public function Service()
    {
        return $this->hasMany(Service::class,'vehicle_id');
    }



    public function insurance()
    {
        return $this->hasMany(InsurancePayment::class,'vehicle_id');
    }

}

