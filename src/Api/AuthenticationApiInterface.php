<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Security\Authentication;

/**
 * API to manage the authentication.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface AuthenticationApiInterface
{
    /**
     * Authenticates with the password grant type.
     *
     * @param Authentication $authentication
     *
     * @return array
     */
    public function authenticate(Authentication $authentication): array;
}
