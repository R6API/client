<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ProgressionApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $response = $this->client->getProgressionApi()->get(PlatformType::PC, ['575b8c76-a33a-4c19-9618-d14b9343d527']);

        $this->assertArrayHasKey('player_profiles', $response);

        $this->assertArrayHasKey('xp', $response['player_profiles'][0]);
        $this->assertArrayHasKey('profile_id', $response['player_profiles'][0]);
        $this->assertArrayHasKey('lootbox_probability', $response['player_profiles'][0]);
        $this->assertArrayHasKey('level', $response['player_profiles'][0]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "switch" isn't a valid value from PlatformType enum.
     */
    public function testExceptionPlatformType()
    {
        $this->client->getProfileApi()->get('switch', 'panda_______');
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "$profileIds" field require an UUID as value.
     */
    public function testInvalidFilter()
    {
        $this->client->getProgressionApi()->get(PlatformType::PC, ['foo']);
    }
}
