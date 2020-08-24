<?php

namespace Appletie\Response\Json;

use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse extends JsonResponse
{
    /**
     * ApiResponse constructor.
     * @param array|null $data
     * @param int $status
     * @param array $headers
     */
    public function __construct(array $data = null, int $status = 200, array $headers = [])
    {
        $data['meta'] = $this->addMetaData();
        parent::__construct($data, $status, $headers, false);
    }

    /**
     * @return array
     */
    protected function addMetaData() : array
    {
        return [
            'timestamp' => $this->getTimestamp(),
        ];
    }

    /**
     * Returns the contents as array.
     * @return array
     */
    public function getContentArray() : array
    {
        $json = $this->getContent();
        return json_decode($json, true);
    }

    /**
     * Returns the current timestamp.
     * @return string
     */
    public function getTimestamp() : string
    {
        return (new DateTime('now'))->format(DATE_ATOM);
    }
}
