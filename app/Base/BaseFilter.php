<?php

namespace App\Base;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BaseFilter
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var $builder Builder
     */
    protected $builder;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value) {

            if (is_string($value) && trim($value) === '') {
                continue;
            } elseif (is_array($value) && empty($value)) {
                continue;
            } elseif ($value === null) {
                continue;
            }

            if (!method_exists($this, $name)) {
                continue;
            }

            $this->$name($value);
        }

        return $this->builder;
    }

    public function filters()
    {
        return is_object($this->request) && $this->request instanceof Request ? $this->request->all() : $this->request;
    }
}
