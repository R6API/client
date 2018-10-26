<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Http\ResourceClientInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Abstract API implementation.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
abstract class AbstractApi
{
    /** @var ResourceClientInterface */
    protected $resourceClient;

    /** @var SerializerInterface */
    protected $serializer;

    public function __construct(ResourceClientInterface $resourceClient, SerializerInterface $serializer)
    {
        $this->resourceClient = $resourceClient;
        $this->serializer = $serializer;
    }
}
