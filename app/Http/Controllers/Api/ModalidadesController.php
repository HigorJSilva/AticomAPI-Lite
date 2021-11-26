<?php

namespace App\Http\Controllers\Api;

use App\Helpers\JsonCrudController;
use App\Http\Requests\ModalidadesRequest;
use App\Services\ModalidadesService;

class ModalidadesController extends BaseController
{
    protected $request = ModalidadesRequest::class;
    
    public function __construct(ModalidadesService $service)
    {
        $this->service = $service;
    }

    public function getProgresso()
    {
        return jsonDefaultResponse($this->service->getProgresso());
    }
}
