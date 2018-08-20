<?php
declare(strict_types=1);

namespace R6API\Client\Routing;

use Http\Discovery\UriFactoryDiscovery;
use Http\Message\UriFactory;
use Psr\Http\Message\UriInterface;

/**
 * Generate a complete uri from a base path, uri parameters, and query parameters.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class UriGenerator implements UriGeneratorInterface
{
    /** @var string */
    private $baseUri;

    /** @var UriFactory */
    private $uriFactory;

    /**
     * @param string $baseUri Base URI of the API
     */
    public function __construct($baseUri)
    {
        $this->baseUri = rtrim($baseUri, '/');
        $this->uriFactory = UriFactoryDiscovery::find();
    }

    /**
     * {@inheritdoc}
     */
    public function generate(string $path, array $uriParameters = [], array $queryParameters = []): UriInterface
    {
        $uri = $this->baseUri . '/' . ltrim($path, '/');

        if (count($uriParameters) > 0) {
            $uriParameters = http_build_query($uriParameters);
            $uri .= '?'.$uriParameters;
        }
        $queryParameters = $this->booleanQueryParametersAsString($queryParameters);

        if (!empty($queryParameters)) {
            $uri .= '?' . http_build_query($queryParameters, null, '&', PHP_QUERY_RFC3986);
        }

        return $this->uriFactory->createUri($uri);
    }

    /**
     * Transforms boolean query parameters as string 'true' or 'false' instead of 0 or 1.
     *
     * @param array $queryParameters
     *
     * @return array
     */
    protected function booleanQueryParametersAsString(array $queryParameters)
    {
        return array_map(function ($queryParameters) {
            if (!is_bool($queryParameters)) {
                return $queryParameters;
            }
            return true === $queryParameters ? 'true' : 'false';
        }, $queryParameters);
    }

    /**
     * Slash character should not be url encoded because it is not allowed
     * by the webservers for security reasons.
     *
     * This character can be used by product identifier and media code.
     *
     * @param array $uriParameters
     *
     * @return array
     */
    protected function encodeUriParameters(array $uriParameters)
    {
        return array_map(function ($uriParameter) {
            $uriParameter = rawurlencode($uriParameter);
            return preg_replace('~\%2F~', '/', $uriParameter);
        }, $uriParameters);
    }
}
