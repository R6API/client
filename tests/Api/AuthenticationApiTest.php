<?php

namespace R6API\Client\tests\Api;

use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use PHPUnit\Framework\TestCase;
use R6API\Client\Http\HttpClient as ApiHttpClient;
use R6API\Client\Api\AuthenticationApi;
use R6API\Client\Routing\UriGenerator;
use R6API\Client\Security\Authentication;

/**
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class AuthenticationApiTest extends TestCase
{
    public function testIfTicketIsAvailable()
    {
        $httpClient = HttpClientDiscovery::find();
        $requestFactory = MessageFactoryDiscovery::find();

        $httpClient = new ApiHttpClient($httpClient, $requestFactory);
        $uriAuthGenerator = new UriGenerator('https://uplayconnect.ubi.com/');

        $authenticationApi = new AuthenticationApi($httpClient, $uriAuthGenerator);
        $authentication = Authentication::create(getenv('CLIENT_EMAIL'), getenv('CLIENT_PASSWORD'));
        $details = $authenticationApi->authenticate($authentication->getBearer());

        $this->assertArrayHasKey('ticket', $details);
        $this->assertArrayHasKey('expiration', $details);
        $this->assertGreaterThan($details['expiration'], time());
    }
}
