<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AtividadesRequest;
use App\Services\AtividadesService;

class AtividadesController extends BaseController
{
    protected $request = AtividadesRequest::class;
    
    public function __construct(AtividadesService $service)
    {
        $this->service = $service;
    }
}
