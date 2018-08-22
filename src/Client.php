<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Api\ProfileApiInterface;
use R6API\Client\Api\ProgressionApiInterface;
use R6API\Client\Api\StatisticApi;
use R6API\Client\Api\StatisticApiInterface;
use R6API\Client\Security\Authentication;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class Client implements ClientInterface
{
    /** @var Authentication */
    private $authentication;

    /** @var ProfileApiInterface */
    private $profileApi;

    /** @var ProgressionApiInterface */
    private $progressionApi;

    /** @var StatisticApiInterface */
    private $statisticApi;

    /**
     * @param Authentication $authentication
     * @param ProfileApiInterface $profileApi
     * @param ProgressionApiInterface $progressionApi
     * @param StatisticApi $statisticApi
     */
    public function __construct(
        Authentication $authentication,
        ProfileApiInterface $profileApi,
        ProgressionApiInterface $progressionApi,
        StatisticApi $statisticApi
    ) {
        $this->authentication = $authentication;
        $this->profileApi = $profileApi;
        $this->progressionApi = $progressionApi;
        $this->statisticApi = $statisticApi;
    }

    /**
     * {@inheritdoc}
     */
    public function getTicket()
    {
        return $this->authentication->getTicket();
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileApi(): ProfileApiInterface
    {
        return $this->profileApi;
    }

    /**
     * {@inheritdoc}
     */
    public function getProgressionApi(): ProgressionApiInterface
    {
        return $this->progressionApi;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatisticApi(): StatisticApiInterface
    {
        return $this->statisticApi;
    }
}
