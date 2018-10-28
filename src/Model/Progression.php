<?php
declare(strict_types=1);

namespace R6API\Client\Model;

use Ramsey\Uuid\Uuid;

class Progression
{
    /**
     * @var int
     */
    public $xp;

    /**
     * @var Uuid
     */
    public $profileId;

    /**
     * @var int
     */
    public $lootboxProbability;

    /**
     * @var int
     */
    public $level;

    public function getLootboxProbabilityPercent(): float
    {
        return $this->lootboxProbability / 100;
    }
}
