<?php

namespace App\Services;

use App\Models\Atividades;
use App\Models\Referencias;

class AtividadesService extends BaseService
{
    protected $produtoId = null;
    protected $atualizacao = null;
    protected $model = null;
    protected $data = [];
    protected $id = null;

    public function getModel($data = [])
    {
        $produtos = new Atividades($data);
        if (empty($this->data)) return $produtos;
        return $produtos->where('id', $this->id)
            // TODO->where('alunoId', $this->data['alunoId'])
            ->firstOrFail();
    }

    protected function prepareSave($data, $additionalData)
    {
        $data['modalidade'] = Referencias::find($data['referenciaId'])->firstOrFail()->modalidadeId;
        $data['horasConsideradas'] = $data['horasCertificado'] < 40 ?: 40;
        return $data;
    }

    protected function prepareUpdate($model, $data, $additionalData)
    {
        $finalData = $finalData = parent::prepareUpdate($model, (array) $data, $additionalData);
        $finalData['horasConsideradas'] = $data['horasConsideradas'] = $data['horasCertificado'] < 40 ?: 40;
        return $finalData;
    }

    public function rules()
    {
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
