<?php
declare(strict_types=1);

namespace R6API\Client\Routing;

use Psr\Http\Message\UriInterface;

/**
 * Interface to generate a complete uri from a base path, uri parameters, and query parameters.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface UriGeneratorInterface
{
    /**
     * Generate an uri from a path, by adding host and port.
     *
     * @param string $path            Path of the endpoint
     * @param array  $uriParameters   List of the parameters to generate the endpoint
     * @param array  $queryParameters List of the query parameters added to the endpoint
     *
     * @return UriInterface
     */
    public function generate(string $path, array $uriParameters = [], array $queryParameters = []): UriInterface;
}
