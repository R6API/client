<?php
declare(strict_types=1);

namespace R6API\Client\Api\Type;

use Greg0ire\Enum\AbstractEnum;

/**
 * API season types.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
final class SeasonType extends AbstractEnum
{
    const CURRENT = "-1";

    /**
     * Year 1
     */
    const Y1S1 = "0";
    const Y1S2 = "1";
    const Y1S3 = "2";
    const Y1S4 = "3";

    /**
     * Year 2
     */
    const Y2S1 = "4";
    const Y2S2 = "5";
    const Y2S3 = "6";
    const Y2S4 = "7";

    /**
     * Year 3
     */
    const Y3S1 = "8";
    const Y3S2 = "9";
}
