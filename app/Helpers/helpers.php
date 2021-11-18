<?php

if (!function_exists('jsonDefaultResponse')) {
    function jsonDefaultResponse(object $payload, int $status_code = 200, $stacktrace = null)
    {
        if (config('app.debug')) {
            $payload->stacktrace = $stacktrace;
        }
        return response()->json((array)$payload, $status_code);
    }
}
