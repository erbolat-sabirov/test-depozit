<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends BaseModel
{
    use HasFactory;

    const ENTER = 1;
    const CREATE_DEPOZIT = 2;
    const ACCURE = 3;
    const CLOSE_DEPOZIT = 4;

    public function getAttributeLabels(): array
    {
        return [
            'user_id' => __('messages.user_id'),
            'amount' => __('messages.amount'),
            'type' => __('messages.type'),
            'created_at' => __('messages.created_at'),
            'updated_at' => __('messages.updated_at')
        ];   
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function types()
    {
        return [
            self::ENTER => 'Enter',
            self::CREATE_DEPOZIT => 'Create depozit',
            self::ACCURE => 'Accure',
            self::CLOSE_DEPOZIT => 'Close depozit' 
        ];
    }

    public function typeText()
    {
        return $this->types()[$this->type];
    }
}
