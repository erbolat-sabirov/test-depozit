<?php

namespace App\Http\Controllers;

use App\Filters\Holders\TransactionFilterHolder;
use App\Services\Crud\TransactionCrudService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $service;

    public function __construct(TransactionCrudService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $filterModel = new TransactionFilterHolder($request->merge(['user_id' => $request->user()->id])->input());
        $models = $this->service->list($filterModel);

        return view('transaction.index', ['models' => $models]);
    }
}
