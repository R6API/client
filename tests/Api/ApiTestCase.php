<?php

namespace R6API\Client\tests\Api;

use PHPUnit\Framework\TestCase;
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
        $this->builder = new ClientBuilder();
        $this->client = $this->builder->buildAuthenticated(
            getenv('CLIENT_EMAIL'),
            getenv('CLIENT_PASSWORD')
        );
    }
}
