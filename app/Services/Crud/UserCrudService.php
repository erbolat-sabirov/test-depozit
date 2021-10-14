<?php

namespace App\Services\Crud;

use App\Base\BaseCrudService;
use App\Models\User;

class UserCrudService extends BaseCrudService
{
    
    public function model()
    {
        return User::class;
    }

   
}