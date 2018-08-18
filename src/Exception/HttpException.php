<?php
declare(strict_types=1);

namespace R6API\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Http exception thrown when a request failed.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class HttpException extends \RuntimeException implements ExceptionInterface
{
    /** @var RequestInterface */
    protected $request;

    /** @var ResponseInterface */
    protected $response;

    /**
     * @param string            $message  message of the exception
     * @param RequestInterface  $request  failing request
     * @param ResponseInterface $response response of the failing request
     * @param \Exception|null   $previous previous exception
     */
    public function __construct(string $message, RequestInterface $request, ResponseInterface $response, \Exception $previous = null)
    {
        parent::__construct($message, $response->getStatusCode(), $previous);
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Returns the request.
     *
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns the response.
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
