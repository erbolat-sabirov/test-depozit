<?php

namespace App\Http\Controllers;

use App\Dto\DepozitDto;
use App\Filters\Holders\DepozitFilterHolder;
use App\Http\Requests\DepozitRequest;
use App\Services\Crud\DepozitCrudService;
use Illuminate\Http\Request;

class DepozitController extends Controller
{
    protected $service;

    public function __construct(DepozitCrudService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $request->merge(['user_id' => $request->user()->id]);
        $models = $this->service->list(new DepozitFilterHolder($request->input()));
        return view('depozit.index', ['models' => $models]);
    }    

    public function create(Request $request)
    {
        $model = new DepozitDto($request->old());
        return view('depozit.create', ['model' => $model]);
    }

    public function store(DepozitRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;

            $this->service->create(new DepozitDto($data));

            return redirect()->route('depozit.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
