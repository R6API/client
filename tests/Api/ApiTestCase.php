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

    /** @var array */
    protected $profileIds = [
        '71b29fd6-3c4d-46af-96fe-898960ef3faf', // Manlyfique
        '2a60ef4d-6ee1-4cc0-ad4d-1c0d8c964763', // CPC.Evene
        'da8d33f8-1dbe-4efc-a2e4-a0a1e0c68108', // Shep_FR
        '575b8c76-a33a-4c19-9618-d14b9343d527', // panda________
        'fe50c151-d5f4-451b-ac17-33e0b2d0a2fb' // Malotru_
    ];

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
