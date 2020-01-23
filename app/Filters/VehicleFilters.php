<?php

namespace App\Filters;

class VehicleFilters extends Filters
{

    protected $filters = ['name', 'type', 'min_cost', 'max_cost', 'min_creation_date', 'max_creation_date'];

    protected $sorting = ['cost', 'creation_date'];

    public function name($name)
    {
        return $this->builder->where('vehicleName', 'LIKE', '%' . $name . '%');
    }

    public function type($type)
    {
        return $this->builder->whereIn('type', $type);
    }

    public function min_cost($cost)
    {
        return $this->builder->where('cost', '>', $cost);
    }

    public function max_cost($cost)
    {
        return $this->builder->where('cost', '<', $cost);
    }

    public function min_creation_date($created_date)
    {
        return $this->builder->where('createdAt', '>', $created_date);
    }

    public function max_creation_date($created_date)
    {
        return $this->builder->where('createdAt', '<', $created_date);
    }

    public function cost($sort_direction)
    {
        return $this->builder->orderBy('cost' , $sort_direction);
    }

    public function creation_date($creation_date)
    {
        return $this->builder->orderBy('createdAt' , $creation_date);
    }


}
