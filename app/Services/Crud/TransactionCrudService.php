<?php

namespace App\Services\Crud;

use App\Base\BaseCrudService;
use App\Models\Transaction;

class TransactionCrudService extends BaseCrudService
{
    
    public function model()
    {
        return Transaction::class;
    }
}