<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends BaseModel
{
    use HasFactory;

    public function getAttributeLabels(): array
    {
        return [
            'user_id' => __('messages.user_id'),
            'balance' => __('messages.balance'),
            'created_at' => __('messages.created_at'),
            'updated_at' => __('messages.updated_at')
        ];   
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
