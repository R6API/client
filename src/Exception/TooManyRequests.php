<?php
declare(strict_types=1);

namespace R6API\Client\Exception;

/**
 * Exception when too much requests are sent to the API.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class TooManyRequests extends HttpException
{
}
