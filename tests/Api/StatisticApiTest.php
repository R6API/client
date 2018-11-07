<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\StatisticType;
use R6API\Client\Model\Statistic;

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

        $this->assertTrue(is_iterable($response));
        foreach ($response as $statistic) {
            $this->assertTrue($statistic instanceof Statistic);
            $this->assertEquals($this->profileIds[0], $statistic->profileId->toString());
        }
    }

    public function testMultipleSearch()
    {
        $response = $this->client->getStatisticApi()->get(
            PlatformType::PC,
            $this->profileIds,
            $this->statistics
        );

        $this->assertTrue(is_iterable($response));
        $this->assertCount(count($this->profileIds), $response);
        foreach ($response as $statistic) {
            $this->assertTrue($statistic instanceof Statistic);
            $this->assertTrue(in_array($statistic->profileId->toString(), $this->profileIds));
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
