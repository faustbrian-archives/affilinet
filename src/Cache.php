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

use Illuminate\Cache\CacheManager;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Cache.
 */
class Cache
{
    /** @var \Illuminate\Cache\CacheManager */
    private $cache;

    /**
     * Cache constructor.
     */
    public function __construct()
    {
        $container = new Container();

        $container['config'] = [
            'cache.default'     => 'file',
            'cache.stores.file' => [
                'driver' => 'file',
                'path'   => __DIR__.'/../cache',
            ],
        ];

        $container['files'] = new Filesystem();

        $this->cache = (new CacheManager($container))->store();
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->cache, $name], $arguments);
    }
}
