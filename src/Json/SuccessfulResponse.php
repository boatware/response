<?php

namespace Boatware\Response\Json;

class SuccessfulResponse extends ApiResponse
{
    /**
     * SuccessfulResponse constructor.
     * @param array|null $extra
     * @param int $status
     * @param array $headers
     */
    public function __construct(array $extra = null, int $status = 200, array $headers = [])
    {
        $data = [];

        if ($extra) {
            $data['data'] = $extra;
            $data['checksum'] = md5(json_encode($extra));
        }

        parent::__construct(ApiResponse::RESPONSE_STATUS_OK, $data, $status, $headers);
    }
}
