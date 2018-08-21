<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Exception\ApiException;
use R6API\Client\Http\ResourceClientInterface;
use Ramsey\Uuid\Uuid;

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
    public function get(string $platform, array $filters = []): array
    {
        // filters only accept 3 keys: profile_ids
        $acceptedFilterKeys = [
            'profile_ids'
        ];
        foreach ($filters as $key => $value) {
            if (!in_array($key, $acceptedFilterKeys)) {
                throw new ApiException(sprintf('"%s" doesn\'t exists as filter key.', $key));
            }
        }

        // check if "profile_ids" field contains only UUID
        if (isset($filters['profile_ids'])) {
            $profile_ids = explode(',', $filters['profile_ids']);
            foreach ($profile_ids as $profile_id) {
                if (!preg_match('#[0-9a-f]{8}-[0-9a-f]{4}-4[0-9A-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}#', $profile_id)) {
                    throw new ApiException(sprintf('"profile_ids" field require an UUID as value.', $key));
                }
            }
        }

        // only one filter is accepted at a time
        if (count($filters) > 1) {
            throw new ApiException(sprintf('Only one filter is accepted at a time. Among the following filters: %s.', implode(', ', $acceptedFilterKeys)));
        }

        $url = str_replace('%%platform%%', constant(PlatformType::class.'::_URL_'.$platform), static::URL);
        return $this->resourceClient->getResource($url, $filters);
    }
}
