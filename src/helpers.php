<?php

/*
 * This file is part of Affili.net PHP SDK.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Affilinet;

/**
 * Creates a pre-configured Soap client with the default settings.
 *
 * @param string $wsdl   WSDL of the service
 * @param array  $config Soap client configuration
 *
 * @return \SoapClient
 */
function default_soap_client($wsdl, array $config = [])
{
    return new \SoapClient($wsdl, array_merge([
        'trace'        => 1,
        'exceptions'   => 0,
        'soap_version' => SOAP_1_1,
    ], $config));
}