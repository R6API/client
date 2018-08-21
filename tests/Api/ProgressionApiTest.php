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
        $response = $this->client->getProgressionApi()->get(PlatformType::PC, ['profile_ids' => '575b8c76-a33a-4c19-9618-d14b9343d527']);

        $this->assertArrayHasKey('player_profiles', $response);

        $this->assertArrayHasKey('xp', $response['player_profiles'][0]);
        $this->assertArrayHasKey('profile_id', $response['player_profiles'][0]);
        $this->assertArrayHasKey('lootbox_probability', $response['player_profiles'][0]);
        $this->assertArrayHasKey('level', $response['player_profiles'][0]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "foo" doesn't exists as filter key.
     */
    public function testInvalidFilter()
    {
        $this->client->getProgressionApi()->get(PlatformType::PC, ['foo' => 'bar']);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "profile_ids" field require an UUID as value.
     */
    public function testProfileIdOnlyUuid()
    {
        $this->client->getProgressionApi()->get(PlatformType::PC, ['profile_ids' => 'bar']);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage Only one filter is accepted at a time. Among the following filters: profile_ids.
     */
    public function testTooMuchFilters()
    {
        $this->client->getProgressionApi()->get(PlatformType::PC, ['profile_ids' => '575b8c76-a33a-4c19-9618-d14b9343d527', 'foo' => 'bar']);
    }
}
