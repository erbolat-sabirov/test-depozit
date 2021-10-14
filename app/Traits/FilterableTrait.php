<?php

namespace App\Traits;

use App\Base\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

trait FilterableTrait
{
    public function scopeFilter(Builder $builder, $filter)
    {
        if ($filter instanceof BaseFilter) {
            return $filter->apply($builder);
        }
        $class = null;

        if (method_exists($this, 'queryFilterClass')) {
            $class = $this->queryFilterClass();
        } elseif (property_exists($this, 'queryFilterClass')) {
            $class = $this->queryFilterClass;
        }


        if ($class) {
            /**
             * @var $queryFilter QueryFilter
             */
            $queryFilter = new $class($filter);

            return $queryFilter->apply($builder);
        }

        return $builder;
    }
}
