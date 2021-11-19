<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ReferenciasRequest;
use App\Services\ReferenciasService;

class ReferenciasController extends BaseController
{
    protected $request =  ReferenciasRequest::class;
    
    public function __construct(ReferenciasService $service)
    {
        $this->service = $service;
    }
}
