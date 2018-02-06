<?php

declare(strict_types=1);

/*
 * This file is part of Affilinet PHP.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\AffilinetSdk;

/**
 * Class Client.
 */
class Client
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /**
     * Client constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param string $name
     *
     * @return \BrianFaust\Affilinet\Services\AbstractService
     */
    public function service(string $name): Services\AbstractService
    {
        $serviceClass = sprintf('BrianFaust\\AffilinetSdk\\Services\\%sService', ucfirst($name));

        $auth = new Auth($this->username, $this->password, $serviceClass::TYPE);

        return new $serviceClass($auth);
    }
}
