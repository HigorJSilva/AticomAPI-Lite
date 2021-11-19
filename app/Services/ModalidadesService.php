<?php

namespace App\Services;

use App\Models\Modalidades;

class ModalidadesService extends CrudService
{
    
    public function getModel($data = [])
    {
        return new Modalidades($data);
    }

    protected function prepareUpdate($model, $data, $additionalData)
    {
        $finalData = $finalData = parent::prepareUpdate($model, (array) $data, $additionalData);
        return $finalData;
    }
}
