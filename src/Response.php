<?php

namespace BrianFaust\Affilinet;

/**
 * Class Response.
 */
class Response
{
    /**
     * Response constructor.
     *
     * @param $soapResponse
     */
    public function __construct($soapResponse)
    {
        $this->soapResponse = $soapResponse;
    }

    /**
     * @return mixed
     */
    public function body()
    {
        return json_decode(json_encode($this->soapResponse), true);
    }

    /**
     * @return array|bool
     */
    public function errors()
    {
        return (!$this->hasErrors()) ? false : [
            'message' => $this->soapResponse->getMessage(),
            'code'    => $this->soapResponse->getCode(),
        ];
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return $this->soapResponse instanceof \SoapFault;
    }
}
