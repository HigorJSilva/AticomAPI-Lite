<?php

namespace App\Services;

use App\Models\User;

class UsersService extends CrudService
{
    
    public function getModel($data = [])
    {
        return new User($data);
    }

    protected function prepareSave($data, $additionalData)
    {
        return $data;
    }

    protected function prepareUpdate($model, $data, $additionalData)
    {
        $finalData = $finalData = parent::prepareUpdate($model, (array) $data, $additionalData);
        return $finalData;
    }
}
