<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\RegionType;
use R6API\Client\Api\Type\SeasonType;
use R6API\Client\Model\Rank;
use Ramsey\Uuid\Uuid;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class RankApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, [$this->profileIds[0]]);

        $this->assertTrue($this->hasResult($ranks));
        $this->assertTrue($ranks[0]->profileId instanceof Uuid);
    }

    public function testMultipleSearch()
    {
        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, $this->profileIds);
        $this->assertTrue($this->hasResult($ranks));

        /** @var Rank $rank */
        foreach ($ranks as $rank) {
            $this->assertTrue($rank->profileId instanceof Uuid);
            $this->assertTrue(in_array($rank->profileId->toString(), $this->profileIds));
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
     * @expectedExceptionMessage "12" isn't a valid value from SeasonType enum.
     */
    public function testExceptionSeason()
    {
        $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, 12, [$this->profileIds[0]]);
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
        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, [$this->profileIds[0]]);
        $this->assertTrue($this->hasResult($ranks));

        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y3S1, [$this->profileIds[0]]);
        $this->assertTrue($this->hasResult($ranks));

        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y3S2, [$this->profileIds[0]]);
        $this->assertTrue($this->hasResult($ranks));

        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y3S3, [$this->profileIds[0]]);
        $this->assertTrue($this->hasResult($ranks));

        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y2S4, [$this->profileIds[0]]);
        $this->assertTrue($this->hasResult($ranks));

        $ranks = $this->client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::Y2S3, [$this->profileIds[0]]);
        $this->assertTrue($this->hasResult($ranks));
    }

    private function hasResult(array $ranks): bool
    {
        foreach ($ranks as $rank) {
            if ($rank instanceof Rank) {
                return true;
            }
        }

        return false;
    }
}
