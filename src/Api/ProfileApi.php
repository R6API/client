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
    public function get(string $platform, string $value, string $key = 'nameOnPlatform'): array
    {
        // 3 accepted keys: nameOnPlatform, idOnPlatform, userId
        $acceptedFilterKeys = [
            'nameOnPlatform',
            'idOnPlatform',
            'userId'
        ];
        if (!in_array($key, $acceptedFilterKeys)) {
            throw new ApiException(sprintf('"%s" doesn\'t exists as valid key.', $key));
        }

        $parameters = [
            'platformType' => constant(PlatformType::class.'::_PROFILES_'.$platform),
            $key => $value
        ];
        return $this->resourceClient->getResource(self::URL, $parameters);
    }
}
