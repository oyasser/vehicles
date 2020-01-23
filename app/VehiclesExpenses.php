<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclesExpenses extends Model
{
    protected $table = 'vehicles_expenses';


    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

}
