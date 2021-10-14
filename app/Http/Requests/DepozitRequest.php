<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;

class DepozitRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|numeric|between:10,100',
            'percent' => 'required|numeric',
        ];
    }
}
