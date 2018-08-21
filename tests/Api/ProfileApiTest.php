<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ProfileApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $response = $this->client->getProfileApi()->get(PlatformType::PC, ['nameOnPlatform' => 'panda_______']);

        $this->assertArrayHasKey('profiles', $response);

        $this->assertArrayHasKey('profileId', $response['profiles'][0]);
        $this->assertArrayHasKey('userId', $response['profiles'][0]);
        $this->assertArrayHasKey('platformType', $response['profiles'][0]);
        $this->assertArrayHasKey('idOnPlatform', $response['profiles'][0]);
        $this->assertArrayHasKey('nameOnPlatform', $response['profiles'][0]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "foo" doesn't exists as filter key.
     */
    public function testInvalidFilter()
    {
        $this->client->getProfileApi()->get(PlatformType::PC, ['foo' => 'bar']);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage Only one filter is accepted at a time. Among the following filters: nameOnPlatform, idOnPlatform, userId.
     */
    public function testTooMuchFilters()
    {
        $this->client->getProfileApi()->get(PlatformType::PC, ['nameOnPlatform' => 'foo', 'idOnPlatform' => 0]);
    }
}
