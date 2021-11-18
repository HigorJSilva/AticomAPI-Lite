<?php

namespace App\Http\Requests;

class AtividadesRequest extends BaseRequest
{
    public function rules()
    {
        $this->service = $this->getService();

        return [
            'descricao' => [
                'required',
                'string',
                'min:10',
                'max:140'
            ],
            'certificado' => [
                'nullable',
                'string'
            ],
            'referenciaId' => [
                'required',
                'exists:referencias,id',
            ],
            'presencial' => [
                'required',
                'boolean'
            ],
            'horasCertificado' => [
                'required',
                'numeric',
                'min:2',
            ],
            'feedback' => [
                'string',
                'min:20',
                'max:240'
            ],
        ];
    }
}
