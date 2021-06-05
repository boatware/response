<?php

namespace Boatware\Response\Json;

class ErrorResponse extends ApiResponse
{
    public function __construct(string $message, array $extraData = [], int $status = 400, array $headers = [])
    {
        $data = [
            'message' => $message
        ];

        if (!empty($extraData)) {
            $data['extra'] = $extraData;
        }

        parent::__construct(ApiResponse::RESPONSE_STATUS_ERROR, $data, $status, $headers);
    }
}
