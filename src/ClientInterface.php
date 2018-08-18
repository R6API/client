<?php
declare(strict_types=1);

namespace R6API\Client;

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
}
