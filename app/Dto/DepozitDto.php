<?php

namespace App\Dto;

use App\Base\BaseDto;

class DepozitDto extends BaseDto
{

    public $user_id;
    public $amount = 0;
    public $percent = 20;

    public function getData(): array
    {
        return [
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'percent' => $this->percent,
        ];
    }
}