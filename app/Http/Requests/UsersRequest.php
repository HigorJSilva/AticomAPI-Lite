<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UsersRequest extends BaseRequest
{
    public function rules()
    {
        $this->service = $this->getService();
        return [
            'nome' => [
                'required',
                'string',
                'min:10',
                'max:140'
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->email, 'email'),
                'email'
            ],
            'senha' => [
                'required',
                'min:6',
                'max:40'
            ],
            'cpf' => [
                'required',
                Rule::unique('users')->ignore($this->cpf, 'cpf'),
                'cpf'
            ],
            'matrizId' => [
                'required',
                'exists:matrizes,id',
            ],
            'role' => [
                'required',
                'boolean'
            ],
            'isPendente' => [
                'required',
                'nullable'
            ],
            'isCompleto' => [
                'required',
                'nullable'
            ],
        ];
    }
}
