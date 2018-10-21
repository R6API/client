<?php

namespace R6API\Client\tests\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Model\Profile;
use Ramsey\Uuid\Uuid;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ProfileApiTest extends ApiTestCase
{
    public function testSimpleSearch()
    {
        $profiles = $this->client->getProfileApi()->get(PlatformType::PC, 'panda_______');

        $this->assertTrue(is_array($profiles));

        /** @var Profile $profile */
        $profile = $profiles[0];

        $this->assertTrue($profile instanceof Profile);

        $this->assertTrue($profile->profileId instanceof Uuid);
        $this->assertTrue($profile->userId instanceof Uuid);
        $this->assertTrue($profile->idOnPlatform instanceof Uuid);
        $this->assertEquals(PlatformType::PC, $profile->platformType);
        $this->assertEquals('panda_______', $profile->nameOnPlatform);
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
     * @expectedExceptionMessage "bar" doesn't exists as valid key.
     */
    public function testInvalidFilter()
    {
        $this->client->getProfileApi()->get(PlatformType::PC, 'foo', 'bar');
    }
}
