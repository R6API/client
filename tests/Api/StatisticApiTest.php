<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\StatisticType;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class StatisticApiTest extends ApiTestCase
{
    /** @var array */
    protected $statistics = [
        StatisticType::CASUAL_TIMEPLAYED,
        StatisticType::CASUAL_MATCHPLAYED,
        StatisticType::CASUAL_MATCHWON,
        StatisticType::CASUAL_MATCHLOSTS,
        StatisticType::CASUAL_KILLS,
        StatisticType::CASUAL_DEATH
    ];

    public function testSimpleSearch()
    {
        $response = $this->client->getStatisticApi()->get(
            PlatformType::PC,
            [$this->profileIds[0]],
            $this->statistics
        );

        $this->assertArrayHasKey('results', $response);
        foreach ($this->statistics as $statistic) {
            $this->assertArrayHasKey($statistic, $response['results'][$this->profileIds[0]]);
        }
    }

    public function testMultipleSearch()
    {
        $response = $this->client->getStatisticApi()->get(
            PlatformType::PC,
            $this->profileIds,
            $this->statistics
        );

        $this->assertArrayHasKey('results', $response);
        foreach ($this->profileIds as $profileId) {
            foreach ($this->statistics as $statistic) {
                $this->assertArrayHasKey($statistic, $response['results'][$profileId]);
            }
        }
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "switch" isn't a valid value from PlatformType enum.
     */
    public function testExceptionPlatformType()
    {
        $this->client->getStatisticApi()->get('switch', ['panda_______'], [StatisticType::CASUAL_TIMEPLAYED]);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "foo" isn't a valid value from StatisticType enum.
     */
    public function testExceptionStatisticType()
    {
        $this->client->getStatisticApi()->get(PlatformType::PC, ['a997cc50-8bd7-46fb-bdda-ca028abd5faf'], ['foo']);
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "$profileIds" field require an UUID as value.
     */
    public function testInvalidFilter()
    {
        $this->client->getStatisticApi()->get(PlatformType::PC, ['foo'], []);
    }
}
