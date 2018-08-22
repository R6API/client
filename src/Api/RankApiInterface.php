<?php
declare(strict_types=1);

namespace R6API\Client\Api;

/**
 * API to manage the rank.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface RankApiInterface
{
    /**
     * @param string $platform  Platform to use for this request
     * @see \R6API\Client\Api\Type\PlatformType
     *
     * @param string $region
     * @see \R6API\Client\Api\Type\RegionType
     *
     * @param array $profileIds
     *
     * @return array
     */
    public function get(string $platform, string $region, array $profileIds): array;
}
