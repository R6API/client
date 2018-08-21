<?php
declare(strict_types=1);

namespace R6API\Client\Api;

/**
 * API to manage the progression.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface ProgressionApiInterface
{
    /**
     * @param string $platform  Platform to use for this request
     * @see PlatformType
     *
     * @param array $profileIds Profile ID to seek for Progression (only UUID are accepted as profileId)
     *
     * @return array
     */
    public function get(string $platform, array $profileIds): array;
}
