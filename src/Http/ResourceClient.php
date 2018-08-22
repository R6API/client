<?php
declare(strict_types=1);

namespace R6API\Client\Http;

use R6API\Client\Routing\UriGeneratorInterface;

/**
 * Generic client to execute common request on resources.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ResourceClient implements ResourceClientInterface
{
    /** @var HttpClientInterface */
    protected $httpClient;

    /** @var UriGeneratorInterface */
    protected $uriGenerator;

    /**
     * @param HttpClientInterface               $httpClient
     * @param UriGeneratorInterface             $uriGenerator
     */
    public function __construct(
        HttpClientInterface $httpClient,
        UriGeneratorInterface $uriGenerator
    ) {
        $this->httpClient = $httpClient;
        $this->uriGenerator = $uriGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource(string $uri, array $uriParameters = [], array $queryParameters = [])
    {
        $uri = $this->uriGenerator->generate($uri, $uriParameters, $queryParameters);
        $response = $this->httpClient->sendRequest('GET', $uri);

        return json_decode($response->getBody()->getContents(), true);
    }
}
