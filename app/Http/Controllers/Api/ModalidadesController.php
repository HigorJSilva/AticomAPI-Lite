<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ModalidadesRequest;
use App\Services\ModalidadesService;

class ModalidadesController extends BaseController
{
    protected $request = ModalidadesRequest::class;
    
    public function __construct(ModalidadesService $service)
    {
        $this->service = $service;
    }
}
