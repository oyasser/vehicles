<?php
namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    protected $builder;
    protected $filters;
    protected $sorting;

    /**
     * Filters constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * @param $builder
     * @return mixed
     */
    function apply($builder)
    {
        $this->builder = $builder;
        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        foreach ($this->getSorted() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    /**
     * @return array|ø
     */
    public function getFilters()
    {
        $filtersArray = $this->filters;

        return  array_filter($this->request->only(is_array($filtersArray) ? $filtersArray : func_get_args()));

    }


    /**
     * @return array|ø
     */
    public function getSorted()
    {
        $sortedArray = $this->sorting;

        return  array_filter($this->request->only(is_array($sortedArray) ? $sortedArray : func_get_args()));

    }


}
