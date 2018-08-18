<?php
declare(strict_types=1);

namespace R6API\Client;

use Http\Client\HttpClient;
use R6API\Client\Api\AuthenticationApi;
use R6API\Client\Http\AuthenticatedHttpClient;
use R6API\Client\Http\HttpClient as ApiHttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;
use R6API\Client\Http\ResourceClient;
use R6API\Client\Routing\UriGenerator;
use R6API\Client\Security\Authentication;

/**
 * This builder is in charge to instantiate and inject the dependencies.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ClientBuilder
{
    /** @var string */
    protected $authUri;

    /** @var string */
    protected $baseUri;

    /** @var HttpClient */
    protected $httpClient;

    /** @var RequestFactory */
    protected $requestFactory;

    /**
     * @param string $baseUri Base uri to request the API
     * @param string $authUri Base uri to request the Auth API
     */
    public function __construct($authUri = 'https://uplayconnect.ubi.com/', $baseUri = 'https://public-ubiservices.ubi.com/')
    {
        $this->authUri = $authUri;
        $this->baseUri = $baseUri;
    }

    /**
     * Allows to directly set a client instead of using HttpClientDiscovery::find()
     *
     * @param HttpClient $httpClient
     *
     * @return ClientBuilder
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return HttpClient
     */
    private function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = HttpClientDiscovery::find();
        }
        return $this->httpClient;
    }

    /**
     * Allows to directly set a request factory instead of using MessageFactoryDiscovery::find()
     *
     * @param RequestFactory $requestFactory
     *
     * @return ClientBuilder
     */
    public function setRequestFactory($requestFactory)
    {
        $this->requestFactory = $requestFactory;
        return $this;
    }

    /**
     * @return RequestFactory
     */
    private function getRequestFactory()
    {
        if (null === $this->requestFactory) {
            $this->requestFactory = MessageFactoryDiscovery::find();
        }
        return $this->requestFactory;
    }

    /**
     * Build the R6API client authenticated by email & password.
     *
     * @param string $email        Client id to use for the authentication
     * @param string $password     Secret associated to the client
     *
     * @return ClientInterface
     */
    public function buildAuthenticated(string $email, string $password): ClientInterface
    {
        $authentication = Authentication::create($email, $password);
        return $this->buildAuthenticatedClient($authentication);
    }

    /**
     * @param Authentication $authentication
     *
     * @return ClientInterface
     */
    protected function buildAuthenticatedClient(Authentication $authentication)
    {
        // @TODO would be used for future Api(s)
        $resourceClient = $this->setUp($authentication);

        $client = new Client(
            $authentication
        );

        return $client;
    }

    /**
     * @param Authentication $authentication
     *
     * @return ResourceClient
     */
    protected function setUp(Authentication $authentication)
    {
        $uriAuthGenerator = new UriGenerator($this->authUri);
        $uriGenerator = new UriGenerator($this->baseUri);

        $httpClient = new ApiHttpClient($this->getHttpClient(), $this->getRequestFactory());

        $authenticationApi = new AuthenticationApi($httpClient, $uriAuthGenerator);
        $authenticatedHttpClient = new AuthenticatedHttpClient($httpClient, $authenticationApi, $authentication);

        $resourceClient = new ResourceClient(
            $authenticatedHttpClient,
            $uriGenerator
        );

        return $resourceClient;
    }
}
