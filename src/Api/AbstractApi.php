<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Http\ResourceClientInterface;

/**
 * Abstract API implementation.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
abstract class AbstractApi
{
    /** @var ResourceClientInterface */
    protected $resourceClient;

    /**
     * @param ResourceClientInterface $resourceClient
     */
    public function __construct(ResourceClientInterface $resourceClient)
    {
        $this->resourceClient = $resourceClient;
    }
}
