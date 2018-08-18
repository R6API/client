<?php
declare(strict_types=1);

namespace R6API\Client\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use R6API\Client\Exception\HttpException;

/**
 * It aims to throw exception thanks to the the response's HTTP status code if the request has failed.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class HttpExceptionHandler
{
    /**
     * Transforms response to an exception if possible.
     *
     * @param RequestInterface  $request  Request of the call
     * @param ResponseInterface $response Response of the call
     *
     * @throws HttpException    If response status code is unknown
     *
     * @return ResponseInterface
     */
    public function transformResponseToException(RequestInterface $request, ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new HttpException("Unhandled status code", $request, $response);
        }

        return $response;
    }

    /**
     * Returns the response message, or the reason phrase if there is none.
     *
     * @param ResponseInterface $response
     *
     * @return string
     */
    protected function getResponseMessage(ResponseInterface $response)
    {
        $responseBody = $response->getBody();

        $responseBody->rewind();
        $decodedBody = json_decode($responseBody->getContents(), true);
        $responseBody->rewind();

        return isset($decodedBody['message']) ? $decodedBody['message'] : $response->getReasonPhrase();
    }
}
