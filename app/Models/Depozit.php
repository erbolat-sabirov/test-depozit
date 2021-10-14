<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\DepozitFilter;
use App\Helpers\CalcDepozit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depozit extends BaseModel
{
    use HasFactory;

    const STATUS_OPEN = 'open';
    const STATUS_CLOSE = 'close';

    public $queryFilterClass = DepozitFilter::class;

    public function getAttributeLabels(): array
    {
        return [
            'user_id' => __('messages.user_id'),
            'amount' => __('messages.amount'),
            'status' => __('messages.status'),
            'percent' => __('messages.percent'),
            'accrue_amount' => __('messages.accrue_amount'),
            'number_accrued' => __('messages.number_accrued'),
            'created_at' => __('messages.created_at'),
            'updated_at' => __('messages.updated_at')
        ];   
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function percentTotalSum()
    {
        return CalcDepozit::run($this->totalSum(), $this->percent);
    }

    public function totalSum()
    {
        return $this->amount + $this->accrue_amount;
    }

    public function originalTotalSum()
    {
        return $this->getOriginal('amount') + $this->getOriginal('accrue_amount');
    }
}
