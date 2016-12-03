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

namespace BrianFaust\Affilinet;

use Carbon\Carbon;

/**
 * Class Auth.
 */
class Auth
{
    /** @var string */
    const WSDL_PUBLISHER = 'https://api.affili.net/V2.0/Logon.svc?wsdl';

    /** @var string */
    const WSDL_PRODUCT = 'http://product-api.affili.net/Authentication/Logon.svc?wsdl';

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $webServiceType;

    /** @var \SoapClient */
    private $service;

    /**
     * Auth constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $webServiceType
     */
    public function __construct(string $username, string $password, string $webServiceType): void
    {
        $this->username = $username;
        $this->password = $password;
        $this->webServiceType = $webServiceType;

        $this->service = default_soap_client(
            $webServiceType === 'Publisher' ? static::WSDL_PUBLISHER : static::WSDL_PRODUCT
        );

        $this->cache = new Cache();
    }

    /**
     * @return mixed
     */
    public function getToken(): string
    {
        if ($this->tokenHasExpired()) {
            $token = $this->createToken();

            $expiresAt = $this->getTokenExpirationDate($token);
            $expiresAt = (new Carbon($expiresAt))->addMinutes(20);

            $this->cache->put($this->getCacheKey(), $token, $expiresAt);
        }

        return $this->cache->get($this->getCacheKey());
    }

    /**
     * @return bool
     */
    private function tokenHasExpired(): bool
    {
        return !$this->cache->has($this->getCacheKey());
    }

    /**
     * @return mixed
     */
    private function createToken(): string
    {
        return $this->service->Logon([
            'Username'       => $this->username,
            'Password'       => $this->password,
            'WebServiceType' => $this->webServiceType,
        ]);
    }

    /**
     * @param null $token
     *
     * @return mixed
     */
    private function getTokenExpirationDate($token): string
    {
        return $this->service->GetIdentifierExpiration($token);
    }

    /**
     * @return string
     */
    private function getCacheKey(): string
    {
        return 'affilinet_'.$this->webServiceType.'_token';
    }
}
