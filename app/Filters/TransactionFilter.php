<?php

namespace App\Filters;

use App\Base\BaseFilter;

class TransactionFilter extends BaseFilter
{
    public function user_id($value)
    {
        return $this->builder->where('user_id', $value);
    }
}