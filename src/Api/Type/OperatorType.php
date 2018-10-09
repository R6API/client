<?php
declare(strict_types=1);

namespace R6API\Client\Api\Type;

use Greg0ire\Enum\AbstractEnum;

/**
 * API operator types.
 *
 * @author Travis Blasingame <tpblasingame@gmail.com>
 */
class OperatorType extends AbstractEnum
{
    /**
     * CTU: SAS
     * Added: Launch
     */
    const SMOKE = '2:1';

    const MUTE = '3:1';

    const SLEDGE = '4:1';

    const THATCHER = '5:1';

    /**
     * CTU: FBI SWAT
     * Added: Launch
     */
    const CASTLE = '2:2';

    const ASH = '3:2';

    const PULSE = '4:2';

    const THERMITE = '5:2';

    /**
     * CTU: GIGN
     * Added: Launch
     */
    const DOC = '2:3';

    const ROOK = '3:3';

    const TWITCH = '4:3';

    const MONTAGNE = '5:3';

    /**
     * CTU: Spetznaz
     * Added: Launch
     */
    const GLAZ = '2:4';

    const FUZE = '3:4';

    const KAPKAN = '4:4';

    const TACHANKA = '5:4';

    /**
     * CTU: GSG-9
     * Added: Launch
     */
    const BLITZ = '2:5';

    const IQ = '3:5';

    const JAGER = '4:5';

    const BANDIT = '5:5';

    /**
     * CTU: JTF-2
     * Added: Year 1 Season 1
     */
    const BUCK = '2:6';

    const FROST = '3:6';

    /**
     * CTU: Navy SEALs
     * Added: Year 1 Season 2
     */
    const BLACKBEARD = '2:7';

    const VALKYRIE = '3:7';

    /**
     * CTU: BOPE
     * Added: Year 1 Season 3
     */
    const CAPITAO = '2:8';

    const CAVIERA = '3:8';

    /**
     * CTU: SAT
     * Added: Year 1 Season 4
     */
    const HIBANA = '2:9';

    const ECHO = '3:9';

    /**
     * CTU: GEO
     * Added: Year 2 Season 1
     */
    const JACKAL = '2:A';

    const MIRA = '3:A';

    /**
     * CTU: SDU
     * Added: Year 2 Season 2
     */
    const YING = '2:B';

    const LESION = '3:B';

    /**
     * CTU: GROM
     * Added: Year 2 Season 3
     */
    const ELA = '2:C';

    const ZOFIA = '3:C';

    /**
     * CTU: 707th SMB
     * Added: Year 2 Season 4
     */
    const DOKKAEBI = '2:D';

    const VIGIL = '3:D';

    /**
     * CTU: CBRN
     * Added: Year 3 Season 1
     */
    const LION = '2:E';

    const FINKA = '3:E';

    /**
     * CTU: GIS
     * Added: Year 3 Season 2
     */
    const MAESTRO = '2:F';

    const ALIBI = '3:F';

    /**
     * CTU: GSUTR
     * Added: Year 3 Season 3
     */
    const MAVERICK = '2:10';

    const CLASH = '3:10';
}
