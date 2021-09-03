<?php

namespace App\Helpers;

use App\Services\BaseService;
use Illuminate\Http\Request;

abstract class JsonCrudController extends Controller
{
    /**
     * @var BaseService
     */
    protected $service;

    public function __construct()
    {
        $resourceName = str_replace('Controller', '', class_basename($this));
        $this->service = app('App\Services\\' . $resourceName . 'Service');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->service->list($this->prepareFilters($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->jsonDefaultResponse($this->service->save($this->prepareData($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return $this->jsonDefaultResponse($this->service->search($id, $this->prepareFilters($request->all())));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->jsonDefaultResponse($this->service->update($id, $this->prepareData($request->all())));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->jsonDefaultResponse((object) $this->service->deactivate($id));
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reactivate($id)
    {
        return $this->jsonDefaultResponse((object) $this->service->reactivate($id));
    }

    /**
     * @param array $data
     * @return array
     */
    protected function prepareFilters($data)
    {
        return $data;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function prepareData($data)
    {
        return $data;
    }

    private function jsonDefaultResponse(object $payload, int $status_code = 200, $stacktrace = null)
    {
        if (config('app.debug')) {
            $payload->stacktrace = $stacktrace;
        }
        return response()->json((array)$payload, $status_code);
    }
}
