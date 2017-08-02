<?php

declare(strict_types=1);

/*
 * This file is part of Affilinet PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\AffilinetSdk;

use SoapClient;

/**
 * Creates a pre-configured Soap client with the default settings.
 *
 * @param string $wsdl   WSDL of the service
 * @param array  $config Soap client configuration
 *
 * @return SoapClient
 */
function default_soap_client($wsdl, array $config = []): SoapClient
{
    return new SoapClient($wsdl, array_merge([
        'trace'        => 1,
        'exceptions'   => 0,
        'soap_version' => SOAP_1_1,
    ], $config));
}
