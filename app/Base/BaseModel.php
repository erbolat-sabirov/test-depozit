<?php

namespace App\Base;

use App\Traits\FilterableTrait;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected $guarded = [];

    use FilterableTrait;

    abstract function getAttributeLabels(): array;
}