<?php
declare(strict_types=1);

namespace R6API\Client\Model;

use Ramsey\Uuid\Uuid;

class Statistic
{
    /**
     * @var Uuid
     */
    public $profileId;

    /**
     * @var array
     */
    public $statistics;
}
