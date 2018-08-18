<?php
declare(strict_types=1);

namespace R6API\Client\Api;

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
     * @param string $bearer
     *
     * @return array
     */
    public function authenticate(string $bearer): array;
}
