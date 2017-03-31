<?php

/*
 * This file is part of Affili.net PHP SDK.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Affili.net PHP SDK.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Affilinet\Services;

use BrianFaust\Affilinet\Auth;
use BrianFaust\Affilinet\Response;

/**
 * Class AbstractService.
 */
abstract class AbstractService
{
    /** @var \SoapClient */
    private $client;

    /**
     * AbstractService constructor.
     *
     * @param Auth $auth
     */
    public function __construct(Auth $auth): void
    {
        $this->auth = $auth;
        $this->client = \BrianFaust\Affilinet\default_soap_client(static::WSDL);
    }

    /**
     * @param string $method
     * @param array  $params
     *
     * @return \BrianFaust\Affilinet\Response
     */
    public function __call(string $method, array $params): Response
    {
        $params = array_merge([
            'CredentialToken' => $this->auth->getToken(),
        ], array_get($params, '0', []));

        $response = $this->client->$method($params);

        return new Response($response);
    }
}
