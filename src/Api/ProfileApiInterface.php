<?php
declare(strict_types=1);

namespace R6API\Client\Api;

/**
 * API to manage the profiles.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
interface ProfileApiInterface
{
    /**
     * @param string $platform  Platform to use for this request
     * @see PlatformType
     *
     * @param array $filters    Filters to apply on this query
     *
     * @return array
     */
    public function get(string $platform, array $filters = []): array;
}
