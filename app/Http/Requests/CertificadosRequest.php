<?php

namespace App\Http\Requests;

class CertificadosRequest extends BaseRequest
{
    public function rules()
    {
        $this->service = $this->getService();

        return [
            'alunoId' => [
                'required',
                'exists:users,id'
            ],
            'atividadeId' => [
                'required',
                'exists:atividades,id'
            ],
            'certificado' => [
                'required',
                'file',
                'mimes:pdf'
            ],
          
        ];
    }
}
