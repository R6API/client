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
     */
    public function sendRequest(string $httpMethod, $uri, array $headers = [], $body = null): ResponseInterface
    {
        if ($this->authentication->isExpired()) {
            $this->authenticate();
        }

        try {
            $headers['Ubi_v1'] =  sprintf('t=%s', $this->authentication->getTicket());
            $response = $this->basicHttpClient->sendRequest($httpMethod, $uri, $headers, $body);
        } catch (UnauthorizedHttpException $e) {
            $this->authenticate();

            $headers['Ubi_v1'] =  sprintf('t=%s', $this->authentication->getTicket());
            $response =  $this->basicHttpClient->sendRequest($httpMethod, $uri, $headers, $body);
        }

        return $response;
    }

    private function authenticate()
    {
        $data = $this->authenticationApi->authenticate($this->authentication->getBearer());

        $this->authentication
            ->setTicket($data['ticket'])
            ->setExpiration($data['expiration']);
    }
}
