<?php

namespace App\Observers;

use App\Dto\BalanceReplenishmentDto;
use App\Helpers\CalcDepozit;
use App\Models\Depozit;
use App\Models\Transaction;
use App\Services\Crud\WalletCrudService;

class DepozitObserver
{
    protected $service;

    public function __construct(WalletCrudService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the Depozit "created" event.
     *
     * @param  \App\Models\Depozit  $depozit
     * @return void
     */
    public function created(Depozit $depozit)
    {
        $dto = new BalanceReplenishmentDto([
            'amount' => $depozit->amount, 
            'user_id' => $depozit->user_id, 
            'type' => Transaction::CREATE_DEPOZIT
        ]);

        $this->service->updateUserBalance($dto);
    }

    /**
     * Handle the Depozit "updated" event.
     *
     * @param  \App\Models\Depozit  $depozit
     * @return void
     */
    public function updating(Depozit $depozit)
    {
        if ($depozit->number_accrued == 10) {
            $type = Transaction::CLOSE_DEPOZIT;
        }else{
            $type = Transaction::ACCURE;
        }
        $dto = new BalanceReplenishmentDto([
            'amount' => CalcDepozit::run($depozit->originalTotalSum(), $depozit->percent), 
            'user_id' => $depozit->user_id, 
            'type' => $type
        ]);

        $this->service->updateUserBalance($dto);
    }

    /**
     * Handle the Depozit "deleted" event.
     *
     * @param  \App\Models\Depozit  $depozit
     * @return void
     */
    public function deleted(Depozit $depozit)
    {
        //
    }

    /**
     * Handle the Depozit "restored" event.
     *
     * @param  \App\Models\Depozit  $depozit
     * @return void
     */
    public function restored(Depozit $depozit)
    {
        //
    }

    /**
     * Handle the Depozit "force deleted" event.
     *
     * @param  \App\Models\Depozit  $depozit
     * @return void
     */
    public function forceDeleted(Depozit $depozit)
    {
        //
    }
}
