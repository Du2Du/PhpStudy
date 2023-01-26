<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'cpf' => ['required'],
            'email' => ['email', 'required'],
            'password' => ['required', 'min:6'],
        ];
    }
}
