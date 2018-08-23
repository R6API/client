<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\RegionType;
use R6API\Client\Api\Type\SeasonType;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class RankApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, [$this->profileIds[0]]);

        $this->assertArrayHasKey('players', $response);

        $this->assertArrayHasKey('board_id', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('past_seasons_abandons', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('update_time', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('skill_mean', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('abandons', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('season', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('region', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('profile_id', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('past_seasons_losses', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('max_mmr', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('mmr', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('wins', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('skill_stdev', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('rank', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('losses', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('next_rank_mmr', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('past_seasons_wins', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('previous_rank_mmr', $response['players'][$this->profileIds[0]]);
        $this->assertArrayHasKey('max_rank', $response['players'][$this->profileIds[0]]);
    }

    public function testMultipleSearch()
    {
        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, $this->profileIds);

        $this->assertArrayHasKey('players', $response);

        foreach ($response['players'] as $profileId => $details) {
            $this->assertArrayHasKey('board_id', $details);
            $this->assertArrayHasKey('past_seasons_abandons', $details);
            $this->assertArrayHasKey('update_time', $details);
            $this->assertArrayHasKey('skill_mean', $details);
            $this->assertArrayHasKey('abandons', $details);
            $this->assertArrayHasKey('season', $details);
            $this->assertArrayHasKey('region', $details);
            $this->assertArrayHasKey('profile_id', $details);
            $this->assertArrayHasKey('past_seasons_losses', $details);
            $this->assertArrayHasKey('max_mmr', $details);
            $this->assertArrayHasKey('mmr', $details);
            $this->assertArrayHasKey('wins', $details);
            $this->assertArrayHasKey('skill_stdev', $details);
            $this->assertArrayHasKey('rank', $details);
            $this->assertArrayHasKey('losses', $details);
            $this->assertArrayHasKey('next_rank_mmr', $details);
            $this->assertArrayHasKey('past_seasons_wins', $details);
            $this->assertArrayHasKey('previous_rank_mmr', $details);
            $this->assertArrayHasKey('max_rank', $details);

            $this->assertTrue(in_array($details['profile_id'], $this->profileIds));
        }
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "switch" isn't a valid value from PlatformType enum.
     */
    public function testExceptionPlatform()
    {
        $this->client->getRankApi()->get('switch', RegionType::EUROPE, SeasonType::CURRENT, [$this->profileIds[0]]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "atlantis" isn't a valid value from RegionType enum.
     */
    public function testExceptionRegion()
    {
        $this->client->getRankApi()->get(PlatformType::PC, 'atlantis', SeasonType::CURRENT, [$this->profileIds[0]]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "Y3S2" isn't a valid value from SeasonType enum.
     */
    public function testExceptionSeason()
    {
        $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, 'Y3S2', [$this->profileIds[0]]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "$profileIds" field require an UUID as value.
     */
    public function testExceptionProfileIds()
    {
        $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, ['foo']);
    }

    public function testSeasons()
    {
        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, [$this->profileIds[0]]);
        $this->assertArrayHasKey('players', $response);

        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y3S1, [$this->profileIds[0]]);
        $this->assertArrayHasKey('players', $response);

        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y3S2, [$this->profileIds[0]]);
        $this->assertArrayHasKey('players', $response);

        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y2S4, [$this->profileIds[0]]);
        $this->assertArrayHasKey('players', $response);

        $response = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y2S3, [$this->profileIds[0]]);
        $this->assertArrayHasKey('players', $response);
    }
}
