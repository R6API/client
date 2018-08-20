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
}
