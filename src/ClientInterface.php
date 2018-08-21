<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Api\ProfileApiInterface;
use R6API\Client\Api\ProgressionApiInterface;

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
}
