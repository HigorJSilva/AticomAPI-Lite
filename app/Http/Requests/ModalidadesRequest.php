<?php

namespace App\Http\Requests;

class ModalidadesRequest extends BaseRequest
{
    public function rules()
    {
        $this->service = $this->getService();

        return [
            'cargaHorariaMax' => [
                'required',
                'gt:cargaHorariaMin',
                'max:90',
                'numeric',
            ],
            'cargaHorariaMin' => [
                'required',
                'lt:cargaHorariaMax',
                'min:2',
                'numeric',
            ],
          
        ];
    }
}
