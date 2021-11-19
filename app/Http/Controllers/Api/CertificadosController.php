<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CertificadosRequest;
use App\Services\CertificadosService;

class CertificadosController extends BaseController
{
    protected $request =  CertificadosRequest::class;
    
    public function __construct(CertificadosService $service)
    {
        $this->service = $service;
    }
}
