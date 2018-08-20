<?php
declare(strict_types=1);

namespace R6API\Client\Http;

use Psr\Http\Message\ResponseInterface;
use R6API\Client\Api\AuthenticationApiInterface;
use R6API\Client\Exception\UnauthorizedHttpException;
use R6API\Client\Security\Authentication;

/**
 * Http client to send an authenticated request.
 *
 * The authentication process is automatically handle by this client implementation.
 *
 * It enriches the request with an access token.
 * If the access token is expired, it will automatically refresh it.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class AuthenticatedHttpClient implements HttpClientInterface
{
    /** @var string */
    const UBI_APPID = '39baebad-39e5-4552-8c25-2c9b919064e2';

    /** @var HttpClient */
    protected $basicHttpClient;

    /** @var AuthenticationApiInterface */
    protected $authenticationApi;

    /** @var Authentication */
    protected $authentication;

    /**
     * @param HttpClient                 $basicHttpClient
     * @param AuthenticationApiInterface $authenticationApi
     * @param Authentication             $authentication
     */
    public function __construct(
        HttpClient $basicHttpClient,
        AuthenticationApiInterface $authenticationApi,
        Authentication $authentication
    ) {
        $this->basicHttpClient = $basicHttpClient;
        $this->authenticationApi = $authenticationApi;
        $this->authentication = $authentication;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function sendRequest(string $httpMethod, $uri, array $headers = [], $body = null): ResponseInterface
    {
        if ($this->authentication->isExpired()) {
            $this->authenticate();
        }

        try {
            $headers = $this->genericHeaders($headers);
            $response = $this->basicHttpClient->sendRequest($httpMethod, $uri, $headers, $body);
        } catch (UnauthorizedHttpException $e) {
            $this->authenticate();

            $headers = $this->genericHeaders($headers);
            $response =  $this->basicHttpClient->sendRequest($httpMethod, $uri, $headers, $body);
        }

        return $response;
    }

    /**
     * @param array $headers
     *
     * @return array
     */
    private function genericHeaders(array $headers): array
    {
        $headers['Content-Type'] = 'application/json; charset=UTF-8';
        $headers['Authorization'] =  sprintf('Ubi_v1 t=%s', $this->authentication->getTicket());
        $headers['Ubi-AppId'] = static::UBI_APPID;

        return $headers;
    }

    /**
     * @throws \Exception
     */
    private function authenticate()
    {
        $data = $this->authenticationApi->authenticate($this->authentication->getBearer());

        $this->authentication
            ->setTicket($data['ticket'])
            ->setExpiration($data['expiration']);
    }
}
