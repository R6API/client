<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Http\ResourceClientInterface;

/**
 * API implementation to manage the profiles.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class ProfileApi implements ProfileApiInterface
{
    const URL = '/v2/profiles';

    /** @var ResourceClientInterface */
    protected $resourceClient;

    /**
     * @param ResourceClientInterface $resourceClient
     */
    public function __construct(ResourceClientInterface $resourceClient)
    {
        $this->resourceClient = $resourceClient;
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $platform, array $filters = []): array
    {
        $parameters = [
            'platformType' => 'uplay'
        ];
        $parameters = array_merge($filters, $parameters);

        return $this->resourceClient->getResource(self::URL, $parameters);
    }
}
