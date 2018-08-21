<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Api\ProfileApiInterface;
use R6API\Client\Api\ProgressionApiInterface;
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

    /**
     * @param Authentication $authentication
     * @param ProfileApiInterface $profileApi
     * @param ProgressionApiInterface $progressionApi
     */
    public function __construct(
        Authentication $authentication,
        ProfileApiInterface $profileApi,
        ProgressionApiInterface $progressionApi
    ) {
        $this->authentication = $authentication;
        $this->profileApi = $profileApi;
        $this->progressionApi = $progressionApi;
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
}
