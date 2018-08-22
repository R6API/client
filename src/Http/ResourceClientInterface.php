<?php
declare(strict_types=1);

namespace R6API\Client\Http;

use R6API\Client\Exception\HttpException;

/**
 * Generic client interface to execute common request on resources.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface ResourceClientInterface
{
    /**
     * Gets a resource.
     *
     * @param string $uri             URI of the resource
     * @param array  $uriParameters   URI parameters of the resource
     * @param array  $queryParameters Query parameters of the request
     *
     * @throws HttpException If the request failed.
     *
     * @return array
     */
    public function getResource(string $uri, array $uriParameters = [], array $queryParameters = []);
}
