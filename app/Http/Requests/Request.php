<?php

namespace App\Http\Requests\NotasFiscais;

use App\Http\Requests\BaseRequest;
use App\Rules\TipoNotaRule;

class Request extends BaseRequest
{
    protected $service;

    public function rules()
    {
        $this->service = $this->getService();
        return [];
    }
}
