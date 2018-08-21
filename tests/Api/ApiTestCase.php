<?php

namespace R6API\Client\tests\Api;

use Cache\Adapter\Predis\PredisCachePool;
use PHPUnit\Framework\TestCase;
use Predis\Client;
use R6API\Client\ClientInterface;
use R6API\Client\ClientBuilder;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
abstract class ApiTestCase extends TestCase
{
    /** @var ClientBuilder */
    protected $builder;

    /** @var ClientInterface */
    protected $client;

    public function setUp()
    {
        $cacheItemPool = new PredisCachePool(new Client(getenv('REDIS_URI')));

        $this->builder = new ClientBuilder();
        $this->builder->setCacheItemPool($cacheItemPool);
        $this->client = $this->builder->buildAuthenticated(
            getenv('CLIENT_EMAIL'),
            getenv('CLIENT_PASSWORD')
        );
    }
}
