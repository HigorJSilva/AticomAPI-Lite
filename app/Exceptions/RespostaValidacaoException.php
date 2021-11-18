<?php

namespace App\Exceptions;

use App\Helpers\JsonCrudController;
use App\Helpers\Resposta;
use Illuminate\Contracts\Validation\Validator;
use Exception;
use App\Helpers\Helpers;

class RespostaValidacaoException extends Exception
{
    public function __construct(Validator $validator, string $message = null)
    {
        parent::__construct();
        $this->message = $message;
        $this->validator = $validator;
    }

    public function render(){
        return $this->jsonDefaultResponse(new Resposta(false, $this->message, null, [$this->validator->errors()]));
    }

    protected function jsonDefaultResponse(object $payload, int $status_code = 200, $stacktrace = null)
    {
        if (config('app.debug')) {
            $payload->stacktrace = $stacktrace;
        }
        return response()->json((array)$payload, $status_code);
    }
}
