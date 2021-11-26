<?php

namespace App\Services;

use App\Models\Atividades;
use App\Models\Referencias;

class AtividadesService extends CrudService
{
    
    public function getModel($data = [])
    {
        return new Atividades($data);
    }

    protected function prepareSave($data, $additionalData)
    {
        $data['alunoId'] = '1';
        $data['horasConsideradas'] = $data['horasCertificado'] < 40 ? $data['horasCertificado'] : 40;
        return $data;
    }

    protected function prepareUpdate($model, $data, $additionalData)
    {
        $finalData = $finalData = parent::prepareUpdate($model, (array) $data, $additionalData);
        $finalData['horasConsideradas'] = $data['horasCertificado'] < 40 ? $data['horasCertificado'] : 40;
        return $finalData;
    }

}
