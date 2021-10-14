<?php

namespace App\Dto;

use App\Base\BaseDto;

class BalanceReplenishmentDto extends BaseDto
{
    public $user_id;
    public $amount = 0;
    public $type;

    public function getData(): array
    {
        return [
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'type' => $this->type
        ];
    }

}