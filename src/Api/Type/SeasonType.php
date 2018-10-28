<?php
declare(strict_types=1);

namespace R6API\Client\Api\Type;

use Greg0ire\Enum\AbstractEnum;

/**
 * API season types.
 * Seasons older than Y2S3 won't actually work.
 * Ubisoft said they were "working on it"
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
final class SeasonType extends AbstractEnum
{
    const CURRENT = -1;

    /**
     * Year 1
     */
    const Y1S1 = 1;
    const Y1S2 = 2;
    const Y1S3 = 3;
    const Y1S4 = 4;

    /**
     * Year 2
     */
    const Y2S1 = 5;
    const Y2S2 = 6;
    const Y2S3 = 7;
    const Y2S4 = 8;

    /**
     * Year 3
     */
    const Y3S1 = 9;
    const Y3S2 = 10;
    const Y3S3 = 11;
}
