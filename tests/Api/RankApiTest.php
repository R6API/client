<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\RegionType;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class RankApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $profileId = '575b8c76-a33a-4c19-9618-d14b9343d527';
        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, [$profileId]);

        $this->assertArrayHasKey('players', $response);

        $this->assertArrayHasKey('board_id', $response['players'][$profileId]);
        $this->assertArrayHasKey('past_seasons_abandons', $response['players'][$profileId]);
        $this->assertArrayHasKey('update_time', $response['players'][$profileId]);
        $this->assertArrayHasKey('skill_mean', $response['players'][$profileId]);
        $this->assertArrayHasKey('abandons', $response['players'][$profileId]);
        $this->assertArrayHasKey('season', $response['players'][$profileId]);
        $this->assertArrayHasKey('region', $response['players'][$profileId]);
        $this->assertArrayHasKey('profile_id', $response['players'][$profileId]);
        $this->assertArrayHasKey('past_seasons_losses', $response['players'][$profileId]);
        $this->assertArrayHasKey('max_mmr', $response['players'][$profileId]);
        $this->assertArrayHasKey('mmr', $response['players'][$profileId]);
        $this->assertArrayHasKey('wins', $response['players'][$profileId]);
        $this->assertArrayHasKey('skill_stdev', $response['players'][$profileId]);
        $this->assertArrayHasKey('rank', $response['players'][$profileId]);
        $this->assertArrayHasKey('losses', $response['players'][$profileId]);
        $this->assertArrayHasKey('next_rank_mmr', $response['players'][$profileId]);
        $this->assertArrayHasKey('past_seasons_wins', $response['players'][$profileId]);
        $this->assertArrayHasKey('previous_rank_mmr', $response['players'][$profileId]);
        $this->assertArrayHasKey('max_rank', $response['players'][$profileId]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "switch" isn't a valid value from PlatformType enum.
     */
    public function testExceptionPlatform()
    {
        $this->client->getRankApi()->get('switch', RegionType::EUROPE, ['575b8c76-a33a-4c19-9618-d14b9343d527']);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "atlantis" isn't a valid value from RegionType enum.
     */
    public function testExceptionRegion()
    {
        $this->client->getRankApi()->get(PlatformType::PC, 'atlantis', ['575b8c76-a33a-4c19-9618-d14b9343d527']);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "$profileIds" field require an UUID as value.
     */
    public function testExceptionProfileIds()
    {
        $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, ['foo']);
    }
}
