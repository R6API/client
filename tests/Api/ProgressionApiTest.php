<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Model\Progression;
use Ramsey\Uuid\Uuid;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ProgressionApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $progressions = $this->client->getProgressionApi()->get(PlatformType::PC, [$this->profileIds[0]]);

        /** @var Progression $progression */
        foreach ($progressions as $progression) {
            $this->assertTrue($progression instanceof Progression);
            $this->assertTrue($progression->profileId instanceof Uuid);
            $this->assertEquals($progression->lootboxProbability, $progression->getLootboxProbabilityPercent() * 100);
        }
    }

    public function testMultipleSearch()
    {
        $progressions = $this->client->getProgressionApi()->get(PlatformType::PC, $this->profileIds);

        $this->assertEquals(count($this->profileIds), count($progressions));

        /** @var Progression $progression */
        foreach ($progressions as $progression) {
            $this->assertTrue($progression instanceof Progression);
            $this->assertTrue($progression->profileId instanceof Uuid);
            $this->assertTrue(in_array($progression->profileId->toString(), $this->profileIds));
            $this->assertEquals($progression->lootboxProbability, $progression->getLootboxProbabilityPercent() * 100);
        }
    }

    /**
     * @expectedException \R6API\Client\Exception\ApiException
     * @expectedExceptionMessage "switch" isn't a valid value from PlatformType enum.
     */
    public function testExceptionPlatformType()
    {
        $this->client->getProgressionApi()->get('switch', [$this->profileIds[0]]);
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
