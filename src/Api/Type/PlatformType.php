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
    /**
     * Use this constants for your requests
     */
    const PLAYSTATION = 'OSBOR_PS4_LNCH_A';
    const XBOX = 'OSBOR_XBOXONE_LNCH_A';
    const PC = 'OSBOR_PC_LNCH_A';

    /**
     * Used for ProfileApi since they have specific strings
     *
     * @see \R6API\Client\Api\ProfileApi
     * @internal
     */
    const _PROFILES_OSBOR_PS4_LNCH_A = 'psn';
    const _PROFILES_OSBOR_XBOXONE_LNCH_A = 'xbl';
    const _PROFILES_OSBOR_PC_LNCH_A = 'uplay';

    /**
     * Used
     *
     * @see \R6API\Client\Api\ProgressionApi
     * @internal
     */
    const _URL_OSBOR_PS4_LNCH_A = '05bfb3f7-6c21-4c42-be1f-97a33fb5cf66/sandboxes/OSBOR_PS4_LNCH_A';
    const _URL_OSBOR_XBOXONE_LNCH_A = '98a601e5-ca91-4440-b1c5-753f601a2c90/sandboxes/OSBOR_XBOXONE_LNCH_A';
    const _URL_OSBOR_PC_LNCH_A = '5172a557-50b5-4665-b7db-e3f2e8c5041d/sandboxes/OSBOR_PC_LNCH_A';
}
