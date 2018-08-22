<?php
declare(strict_types=1);

namespace R6API\Client\Api\Type;

use Greg0ire\Enum\AbstractEnum;

/**
 * API region types.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
final class RegionType extends AbstractEnum
{
    /**
     * Use this constants for your requests
     */
    const EUROPE = 'emea';
    const AMERICA = 'ncsa';
    const ASIA = 'apac';
}
