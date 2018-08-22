<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Api\ProfileApiInterface;
use R6API\Client\Api\ProgressionApiInterface;
use R6API\Client\Api\RankApiInterface;
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

    /** @var RankApiInterface */
    private $rankApi;

    /**
     * @param Authentication $authentication
     * @param ProfileApiInterface $profileApi
     * @param ProgressionApiInterface $progressionApi
     * @param StatisticApiInterface $statisticApi
     * @param RankApiInterface $rankApi
     */
    public function __construct(
        Authentication $authentication,
        ProfileApiInterface $profileApi,
        ProgressionApiInterface $progressionApi,
        StatisticApiInterface $statisticApi,
        RankApiInterface $rankApi
    ) {
        $this->authentication = $authentication;
        $this->profileApi = $profileApi;
        $this->progressionApi = $progressionApi;
        $this->statisticApi = $statisticApi;
        $this->rankApi = $rankApi;
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

    /**
     * {@inheritdoc}
     */
    public function getRankApi(): RankApiInterface
    {
        return $this->rankApi;
    }
}
