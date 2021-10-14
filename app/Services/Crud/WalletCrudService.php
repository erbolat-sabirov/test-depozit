<?php

namespace App\Services\Crud;

use App\Base\BaseCrudService;
use App\Dto\BalanceReplenishmentDto;
use App\Events\TransactionCreateEvent;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class WalletCrudService extends BaseCrudService
{
    
    public function model()
    {
        return Wallet::class;
    }

    public function findUserWallet($user_id)
    {
        $model = $this->query()
                    ->where('user_id', $user_id)
                    ->firstOrFail();
        return $model;
    }

    public function updateUserBalance(BalanceReplenishmentDto $dto)
    {
        DB::transaction(function () use($dto) {
            
            $this->updateWallet($dto);

            TransactionCreateEvent::dispatch($dto);
        });   
    }

    public function updateWallet(BalanceReplenishmentDto $dto)
    {
        $wallet = $this->findUserWallet($dto->user_id);
        if ($dto->type == Transaction::CREATE_DEPOZIT) {
            $wallet->balance -= $dto->amount;
        }else{
            $wallet->balance += $dto->amount;
        }
        $wallet->save();
    }
}