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
     * @param string $value
     * @param string $key
     *
     * @return array
     */
    public function get(string $platform, string $value, string $key = 'nameOnPlatform'): array;
}
