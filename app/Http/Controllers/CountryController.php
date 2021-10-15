<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    
    public function index(Country $country)
    {
        $users = User::with(['companies' => function($query) use($country){
            $query->where('country_id', $country->id);
        }])->whereHas('companies', function($query) use($country){
            $query->where('country_id', $country->id);
        })->get();

        dd($users->toArray());
    }
}
