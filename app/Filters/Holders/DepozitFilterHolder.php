<?php

namespace App\Filters\Holders;

use App\Base\BaseFilterHolder;
use App\Models\Depozit;

class DepozitFilterHolder extends BaseFilterHolder
{

    public $status;
    public $user_id;

    public function getAttributeLabel($key)
    {
        return Depozit::getAttributesLabel()[$key];
    }
}