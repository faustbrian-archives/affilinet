<?php

namespace BrianFaust\Affilinet;

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
    public function service(string $name) : Services\AbstractService
    {
        $serviceClass = sprintf('BrianFaust\\Affilinet\\Services\\%sService', ucfirst($name));

        $auth = new Auth($this->username, $this->password, $serviceClass::TYPE);

        return new $serviceClass($auth);
    }
}
