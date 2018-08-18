<?php
declare(strict_types=1);

namespace R6API\Client\Exception;

/**
 * Exception for invalid arguments provided to the API client.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
}
