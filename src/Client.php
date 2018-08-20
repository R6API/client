<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Api\ProfileApiInterface;
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

    /**
     * @param Authentication $authentication
     * @param ProfileApiInterface $profileApi
     */
    public function __construct(
        Authentication $authentication,
        ProfileApiInterface $profileApi
    ) {
        $this->authentication = $authentication;
        $this->profileApi = $profileApi;
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
}
