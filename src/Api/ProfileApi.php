<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Exception\ApiException;
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
        // filters only accept 3 keys: nameOnPlatform, idOnPlatform, userId
        $acceptedFilterKeys = [
            'nameOnPlatform',
            'idOnPlatform',
            'userId'
        ];
        foreach ($filters as $key => $value) {
            if (!in_array($key, $acceptedFilterKeys)) {
                throw new ApiException(sprintf('"%s" doesn\'t exists as filter key.', $key));
            }
        }

        // only one filter is accepted at a time
        if (count($filters) > 1) {
            throw new ApiException(sprintf('Only one filter is accepted at a time. Among the following filters: %s.', implode(', ', $acceptedFilterKeys)));
        }

        $parameters = [
            'platformType' => constant(PlatformType::class.'::_PROFILES_'.$platform)
        ];
        $parameters = array_merge($filters, $parameters);

        return $this->resourceClient->getResource(self::URL, $parameters);
    }
}
