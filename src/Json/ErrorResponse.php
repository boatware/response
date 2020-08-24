<?php

namespace Appletie\Response\Json;

class ErrorResponse extends ApiResponse
{
    public function __construct(string $message, array $extraData = [], int $status = 400, array $headers = [])
    {
        $data = [
            'status' => 'error',
            'message' => $message
        ];

        if (!empty($extraData)) {
            $data['extra'] = $extraData;
        }

        parent::__construct($data, $status, $headers);
    }
}
