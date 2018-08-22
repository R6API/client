<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\StatisticType;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class StatisticApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $profileId = 'a997cc50-8bd7-46fb-bdda-ca028abd5faf';
        $statistics = [
            StatisticType::CASUAL_TIMEPLAYED,
            StatisticType::CASUAL_MATCHPLAYED,
            StatisticType::CASUAL_MATCHWON,
            StatisticType::CASUAL_MATCHLOSTS,
            StatisticType::CASUAL_KILLS,
            StatisticType::CASUAL_DEATH
        ];

        $response = $this->client->getStatisticApi()->get(
            PlatformType::PC,
            [$profileId],
            $statistics
        );

        $this->assertArrayHasKey('results', $response);
        foreach ($statistics as $statistic) {
            $this->assertArrayHasKey($statistic, $response['results'][$profileId]);
        }
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
