<?php

namespace App\Http\Controllers;

use App\Dto\BalanceReplenishmentDto;
use App\Http\Requests\BalanceReplenishmentRequest;
use App\Models\Transaction;
use App\Services\Crud\WalletCrudService;
use Illuminate\Http\Request;

class BalanceReplenishmentController extends Controller
{
    protected $service;

    public function __construct(WalletCrudService $service)
    {
        $this->service = $service;
    }

    
    public function create(Request $request)
    {
        $model = new BalanceReplenishmentDto($request->old());
        return view('balance-replenishment.edit', ['model' => $model]);
    }

    public function store(BalanceReplenishmentRequest $request)
    {
        try {
            $dto = new BalanceReplenishmentDto([
                'amount' => $request->amount,
                'user_id' => $request->user()->wallet->id,
                'type' =>  Transaction::ENTER
            ]);
            $this->service->updateUserBalance($dto);
            return redirect('dashboard')->with('success', 'Success');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
