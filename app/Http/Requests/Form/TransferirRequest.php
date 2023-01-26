<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class TransferirRequest extends FormRequest
{
    public function rules()
    {
        return [
            'userId' => ['required'],
            'destinatarioId' => ['required'],
            'moneyQuantity' => ['required', 'min:1'],
        ];
    }
}
