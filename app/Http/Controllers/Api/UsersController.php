<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UsersRequest;
use App\Services\UsersService;

class UsersController extends BaseController
{
    protected $request = UsersRequest::class;
    
    public function __construct(UsersService $service)
    {
        $this->service = $service;
    }
}
