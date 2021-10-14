<?php

namespace App\Services\Crud;

use App\Base\BaseCrudService;
use App\Models\Depozit;

class DepozitCrudService extends BaseCrudService
{
    
    public function model()
    {
        return Depozit::class;
    }

    public function accrueDepozits()
    {
        $depozits = $this->list(['status' => Depozit::STATUS_OPEN]);
        foreach ($depozits as $key => $depozit) {
            $number_accrued = $depozit->number_accrued + 1;
            $data = ['number_accrued' => $number_accrued];
            $data['accrue_amount'] = $depozit->accrue_amount;

            if ($number_accrued == 10){
                $data['status'] = Depozit::STATUS_CLOSE;
            }
            $data['accrue_amount'] += $depozit->percentTotalSum();
            $depozit->update($data);
        }
    }
}