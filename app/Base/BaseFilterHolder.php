<?php

namespace App\Base;

use App\Traits\ArrayAccessTrait;
use App\Traits\LazyLoadTrait;
use App\Traits\ToArrayTrait;

abstract class BaseFilterHolder
{
    use ToArrayTrait;
    use LazyLoadTrait;
    use ArrayAccessTrait;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->load($data);
        }
    }
}