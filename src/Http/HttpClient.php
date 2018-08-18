<?php
declare(strict_types=1);

namespace R6API\Client\Http;

use Http\Client\HttpClient as BaseHttpClient;
use Http\Message\RequestFactory;

/**
 * Http client to send a request without any authentication.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class HttpClient implements HttpClientInterface
{
    /** @var BaseHttpClient */
    private $httpClient;

    /** @var RequestFactory */
    protected $requestFactory;

    /** @var HttpExceptionHandler */
    protected $httpExceptionHandler;

    /**
     * @param BaseHttpClient $httpClient
     * @param RequestFactory $requestFactory
     */
    public function __construct(
        BaseHttpClient $httpClient,
        RequestFactory $requestFactory
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->httpExceptionHandler = new HttpExceptionHandler();
    }
    /**
     * {@inheritdoc}
     */
    public function sendRequest($httpMethod, $uri, array $headers = [], $body = null)
    {
        $request = $this->requestFactory->createRequest($httpMethod, $uri, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        $response = $this->httpExceptionHandler->transformResponseToException($request, $response);
        return $response;
    }
}
