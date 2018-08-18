<?php
declare(strict_types=1);

namespace R6API\Client\Http;

use R6API\Client\Exception\HttpException;
use Psr\Http\Message\StreamInterface;

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

    /**
     * Creates a resource.
     *
     * @param string $uri           URI of the resource
     * @param array  $uriParameters URI parameters of the resource
     * @param array  $body          Body of the request
     *
     * @throws HttpException If the request failed.
     *
     * @return int Status code 201 indicating that the resource has been well created.
     */
    public function createResource(string $uri, array $uriParameters = [], array $body = []);

    /**
     * Deletes a resource.
     *
     * @param string $uri           URI of the resource to delete
     * @param array  $uriParameters URI parameters of the resource
     *
     * @throws HttpException If the request failed
     *
     * @return int Status code 204 indicating that the resource has been well deleted
     */
    public function deleteResource(string $uri, array $uriParameters = []);

    /**
     * Gets a streamed resource.
     *
     * @param string $uri           URI of the resource
     * @param array  $uriParameters URI parameters of the resource
     *
     * @throws HttpException If the request failed
     *
     * @return StreamInterface
     */
    public function getStreamedResource(string $uri, array $uriParameters = []);
}
