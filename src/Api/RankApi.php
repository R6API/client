<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\RegionType;
use R6API\Client\Api\Type\SeasonType;
use R6API\Client\Exception\ApiException;
use R6API\Client\Model\Rank;

/**
 * API implementation to manage the ranks.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class RankApi extends AbstractApi implements RankApiInterface
{
    const URL = '/v1/spaces/%%platform%%/r6karma/players';

    /**
     * {@inheritdoc}
     */
    public function get(string $platform, string $region, int $season, array $profileIds): array
    {
        $parameters = [];

        // check $platform is part of PlatformType enum
        if (!PlatformType::isValidValue($platform)) {
            throw new ApiException(sprintf('"%s" isn\'t a valid value from PlatformType enum.', $platform));
        }
        $url = str_replace('%%platform%%', constant(PlatformType::class.'::_URL_'.$platform), static::URL);

        // board_id
        $parameters['board_id'] = 'pvp_ranked';

        // region_id
        if (!RegionType::isValidValue($region)) {
            throw new ApiException(sprintf('"%s" isn\'t a valid value from RegionType enum.', $region));
        }
        $parameters['region_id'] = $region;

        // season_id
        if (!SeasonType::isValidValue($season)) {
            throw new ApiException(sprintf('"%s" isn\'t a valid value from SeasonType enum.', $season));
        }
        $parameters['season_id'] = $season;

        // profile_ids
        // check if $profileIds parameter contains only UUID
        foreach ($profileIds as $profileId) {
            if (!preg_match('#[0-9a-f]{8}-[0-9a-f]{4}-4[0-9A-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}#', $profileId)) {
                throw new ApiException('"$profileIds" field require an UUID as value.');
            }
        }
        $parameters['profile_ids'] = implode(',', $profileIds);

        $data = $this->resourceClient->getResource($url, $parameters);
        return $this->serializer->deserialize(
            $data,
            Rank::class.'[]',
            'json'
        );
    }
}
