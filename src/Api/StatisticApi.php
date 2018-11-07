<?php
declare(strict_types=1);

namespace R6API\Client\Api;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Api\Type\StatisticType;
use R6API\Client\Exception\ApiException;
use R6API\Client\Model\Statistic;

/**
 * API implementation to manage the statistics.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class StatisticApi extends AbstractApi implements StatisticApiInterface
{
    const URL = 'v1/spaces/%%platform%%/playerstats2/statistics';

    /**
     * {@inheritdoc}
     */
    public function get(string $platform, array $profileIds, array $statistics): array
    {
        // check $platform is part of PlatformType enum
        if (!PlatformType::isValidValue($platform)) {
            throw new ApiException(sprintf('"%s" isn\'t a valid value from PlatformType enum.', $platform));
        }

        // check if $profileIds parameter contains only UUID
        foreach ($profileIds as $profileId) {
            if (!preg_match('#[0-9a-f]{8}-[0-9a-f]{4}-4[0-9A-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}#', $profileId)) {
                throw new ApiException('"$profileIds" field require an UUID as value.');
            }
        }

        // check if $statistics parameter contains only values from StatisticType
        foreach ($statistics as $statistic) {
            if (!StatisticType::isValidValue($statistic)) {
                throw new ApiException(sprintf('"%s" isn\'t a valid value from StatisticType enum.', $statistic));
            }
        }

        $url = str_replace('%%platform%%', constant(PlatformType::class.'::_URL_'.$platform), static::URL);
        $data = $this->resourceClient->getResource($url, [
            'populations' => implode(',', $profileIds),
            'statistics' => implode(',', $statistics)
        ]);

        return $this->serializer->deserialize(
            $data,
            Statistic::class.'[]',
            'json'
        );
    }
}
