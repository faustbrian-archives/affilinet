<?php

declare(strict_types=1);

/*
 * This file is part of Affilinet PHP.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\AffilinetSdk;

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
    public function body(): array
    {
        return json_decode(json_encode($this->soapResponse), true);
    }

    /**
     * @return array|bool
     */
    public function errors(): array
    {
        return $this->hasErrors() ? [
            'message' => $this->soapResponse->getMessage(),
            'code'    => $this->soapResponse->getCode(),
        ] : [];
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return $this->soapResponse instanceof \SoapFault;
    }
}
