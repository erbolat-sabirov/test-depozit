<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Models\Transaction;

class TransactionRequest extends BaseRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:' . array_keys(Transaction::types()),
        ];
    }
}
