<?php
declare(strict_types=1);

namespace R6API\Client\Api;

/**
 * API to manage the statistics.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface StatisticApiInterface
{
    /**
     * @param string $platform Platform to use for this request
     * @see PlatformType
     *
     * @param array $profileIds Profile ID to seek for Progression (only UUID are accepted as profileId)
     * @param array $statistics ID of the statistics to fetch
     *
     * @return array
     */
    public function get(string $platform, array $profileIds, array $statistics): array;
}
