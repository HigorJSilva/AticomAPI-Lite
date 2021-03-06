<?php

namespace App\Http\Controllers\Api;

use App\Helpers\JsonCrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends JsonCrudController
{
    public function __invoke()
    {
    }

    public function getService()
    {
        return $this->service;
    }

    public function store(Request $request)
    {
        return parent::store($this->formRequest($request));
    }

    public function update(Request $request, $id)
    {
        return parent::update($this->formRequest($request), $id);
    }

    protected function formRequest($request)
    {
        return isset($this->request) ? app($this->request) : $request;
    }

    protected function prepareFilters($data)
    {
        return $data;
    }
}
