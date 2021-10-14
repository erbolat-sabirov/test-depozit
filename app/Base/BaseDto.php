<?php

namespace App\Base;

use App\Traits\LazyLoadTrait;
use App\Traits\ToArrayTrait;

abstract class BaseDto
{
    use LazyLoadTrait;
    use ToArrayTrait;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->load($data);
        }
    }

    abstract public function getData(): array;

}