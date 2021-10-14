<?php

namespace App\Dto;

use App\Base\BaseDto;

class WalletDto extends BaseDto
{
    public $user_id;
    public $balance = 0;


    public function getData(): array
    {
        return [
            'user_id' => $this->user_id,
            'balance' => $this->balance
        ];
    }
}