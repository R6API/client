<?php
declare(strict_types=1);

namespace R6API\Client\Api\Type;

/**
 * API Platform types.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
abstract class PlatformType
{
    const PLAYSTATION = 'OSBOR_PS4_LNCH_A';
    const XBOX = 'OSBOR_XBOXONE_LNCH_A';
    const PC = 'OSBOR_PC_LNCH_A';

    /**
     * Used for ProfileApi since they have specific strings
     *
     * @see \R6API\Client\Api\ProfileApi
     */
    const _PROFILES_OSBOR_PS4_LNCH_A = 'psn';
    const _PROFILES_OSBOR_XBOXONE_LNCH_A = 'xbl';
    const _PROFILES_OSBOR_PC_LNCH_A = 'uplay';
}
