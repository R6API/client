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
class ProgressionApi implements ProgressionApiInterface
{
    const URL = '/v1/spaces/%%platform%%/r6playerprofile/playerprofile/progressions';

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
    public function get(string $platform, array $profileIds): array
    {
        // check if $profileIds parameter contains only UUID
        foreach ($profileIds as $profileId) {
            if (!preg_match('#[0-9a-f]{8}-[0-9a-f]{4}-4[0-9A-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}#', $profileId)) {
                throw new ApiException('"$profileIds" field require an UUID as value.');
            }
        }

        $url = str_replace('%%platform%%', constant(PlatformType::class.'::_URL_'.$platform), static::URL);
        return $this->resourceClient->getResource($url, ['profile_ids' => implode(',', $profileIds)]);
    }
}
