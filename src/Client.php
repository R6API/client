<?php
declare(strict_types=1);

namespace R6API\Client;

use R6API\Client\Security\Authentication;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class Client implements ClientInterface
{
    /** @var Authentication */
    protected $authentication;

    /**
     * @param Authentication $authentication
     */
    public function __construct(
        Authentication $authentication
    ) {
        $this->authentication = $authentication;
    }

    /**
     * {@inheritdoc}
     */
    public function getTicket()
    {
        return $this->authentication->getTicket();
    }
}
