<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends BaseModel
{
    use HasFactory;

    public function getAttributeLabels(): array
    {
        return [
            'name' => __('Name'),
            'country_id' => __('Country ID')
        ];
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_company')->withPivot(['date_in', 'date_out']);
    }
}
