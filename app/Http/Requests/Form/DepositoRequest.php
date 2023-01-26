<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class DepositoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'moneyQuantity' => ['required', 'min:1'],
            'userId' => ['required'],
        ];
    }
}
