<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class JsonCrudController extends Controller
{
    /**
     * @var CrudService
     */
    protected $service;

    public function __construct()
    {
        $resourceName = str_replace('Controller', '', class_basename($this));
        $this->service = app('App\Services\\' . $resourceName . 'Service');
    }

    private function getRequest($request)
    {
        return method_exists($request, 'validated') && is_callable([$request, 'validated']) ? $request->validated() : $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return jsonDefaultResponse($this->service->list($this->prepareFilters($this->getRequest($request))));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prepare = $this->prepareData($request->all());

        $save = $this->service->save($prepare);
        return jsonDefaultResponse($save);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return jsonDefaultResponse($this->service->search($id, $this->prepareFilters($request->all())));
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
        return jsonDefaultResponse($this->service->update($id, $this->prepareData($request->all())));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return jsonDefaultResponse((object) $this->service->deactivate($id));
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reactivate($id)
    {
        return jsonDefaultResponse((object) $this->service->reactivate($id));
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

}
