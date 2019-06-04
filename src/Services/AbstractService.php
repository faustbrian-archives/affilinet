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

namespace Plients\AffilinetSdk\Services;

use Plients\AffilinetSdk\Auth;
use Plients\AffilinetSdk\Response;

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
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->client = \Plients\AffilinetSdk\default_soap_client(static::WSDL);
    }

    /**
     * @param string $method
     * @param array  $params
     *
     * @return \Plients\Affilinet\Response
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
