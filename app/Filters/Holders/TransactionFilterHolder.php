<?php

namespace App\Filters\Holders;

use App\Base\BaseFilterHolder;
use App\Models\Transaction;

class TransactionFilterHolder extends BaseFilterHolder
{
    
    public $user_id;

    public function getAttributeLabel($key)
    {
        return Transaction::getAttributesLabel()[$key];
    }
}