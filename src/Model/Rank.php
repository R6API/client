<?php
declare(strict_types=1);

namespace R6API\Client\Model;

use Ramsey\Uuid\Uuid;
use R6API\Client\Api\Type\PlatformType;

class Rank
{
    /**
     * @var string
     */
    public $boardId;

    /**
     * @var int
     */
    public $pastSeasonsAbandons;

    /**
     * @var \DateTime
     */
    public $updateTime;

    /**
     * @var float
     */
    public $skillMean;

    /**
     * @var int
     */
    public $abandons;

    /**
     * @var int
     */
    public $season;

    /**
     * @var string
     */
    public $region;

    /**
     * @var Uuid
     */
    public $profileId;

    /**
     * @var int
     */
    public $pastSeasonsLosses;

    /**
     * @var float
     */
    public $maxMmr;

    /**
     * @var float
     */
    public $mmr;

    /**
     * @var int
     */
    public $wins;

    /**
     * @var float
     */
    public $skillStdev;

    /**
     * @var int
     */
    public $rank;

    /**
     * @var int
     */
    public $losses;

    /**
     * @var int
     */
    public $nextRankMmr;

    /**
     * @var int
     */
    public $pastSeasonsWins;

    /**
     * @var int
     */
    public $previousRankMmr;

    /**
     * @var int
     */
    public $maxRank;

    public function getWinLosseRate(): float
    {
        return $this->wins / ($this->wins + $this->losses + $this->abandons);
    }
}
