<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Api\ProfileApiInterface;
use R6API\Client\Api\ProgressionApiInterface;
use R6API\Client\Api\RankApiInterface;
use R6API\Client\Api\StatisticApiInterface;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface ClientInterface
{
    /**
     * Gets the ticket token
     *
     * @return null|string
     */
    public function getTicket();

    /**
     * Gets the profile API
     *
     * @return ProfileApiInterface
     */
    public function getProfileApi(): ProfileApiInterface;

    /**
     * Gets the progression API
     *
     * @return ProgressionApiInterface
     */
    public function getProgressionApi(): ProgressionApiInterface;

    /**
     * Gets the statistic API
     *
     * @return StatisticApiInterface
     */
    public function getStatisticApi(): StatisticApiInterface;

    /**
     * Gets the statistic API
     *
     * @return RankApiInterface
     */
    public function getRankApi(): RankApiInterface;
}
