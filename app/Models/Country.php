<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends BaseModel
{
    use HasFactory;

    public function getAttributeLabels(): array
    {
        return [
            'name' => __('Name')
        ];
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
