<?php
declare(strict_types=1);

namespace R6API\Client\Model;

use Ramsey\Uuid\Uuid;
use R6API\Client\Api\Type\PlatformType;

class Profile
{
    /**
     * @var Uuid
     */
    public $profileId;

    /**
     * @var Uuid
     */
    public $userId;

    /**
     * @var PlatformType
     */
    public $platformType;

    /**
     * @var Uuid;
     */
    public $idOnPlatform;

    /**
     * @var string
     */
    public $nameOnPlatform;
}
