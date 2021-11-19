<?php

namespace App\Http\Requests;

class ReferenciasRequest extends BaseRequest
{
    public function rules()
    {
        $this->service = $this->getService();

        return [
            'descricao' => [
                'required',
                'string',
                'max:140'
            ],
            'modalidadeId' => [
                'required',
                'exists:modalidades,id'
            ],
          
        ];
    }
}
