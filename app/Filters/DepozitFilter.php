<?php

namespace App\Filters;

use App\Base\BaseFilter;

class DepozitFilter extends BaseFilter
{
    public function status($value){
        return $this->builder->where('status', $value);
    }

    public function user_id($value)
    {
        return $this->builder->where('user_id', $value);
    }

}