<?php

if (!function_exists('apiResponse')) {
    function apiResponse($status = true, $message = '', $data = null, $code = 200)
    {
        $response = [
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
        ];

        return service('response')
            ->setStatusCode($code)
            ->setContentType('application/json')
            ->setJSON($response);
    }
}
