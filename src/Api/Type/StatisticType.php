<?php
declare(strict_types=1);

namespace R6API\Client\Api\Type;

use Greg0ire\Enum\AbstractEnum;

/**
 * API region types.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
final class StatisticType extends AbstractEnum
{
    /**
     * Mode: Terrorist Hunt
     * Coop: yes
     */
    const TERROHUNT_COOP_HARD_BESTSCORE = "allterrohuntcoop_hard_bestscore";
    const TERROHUNT_COOP_NORMAL_BESTSCORE = "allterrohuntcoop_normal_bestscore";
    const TERROHUNT_COOP_REALISTIC_BESTSCORE = "allterrohuntcoop_realistic_bestscore";

    /**
     * Mode: Terrorist Hunt
     * Coop: no
     */
    const TERROHUNT_SOLO_HARD_BESTSCORE = "allterrohuntsolo_hard_bestscore";
    const TERROHUNT_SOLO_NORMAL_BESTSCORE = "allterrohuntsolo_normal_bestscore";
    const TERROHUNT_SOLO_REALISTIC_BESTSCORE = "allterrohuntsolo_realistic_bestscore";

    /**
     * Mode: Casual
     */
    const CASUAL_DEATH = "casualpvp_death";
    const CASUAL_KDRATIO = "casualpvp_kdratio";
    const CASUAL_KILLS = "casualpvp_kills";
    const CASUAL_MATCHLOSTS = "casualpvp_matchlost";
    const CASUAL_MATCHPLAYED = "casualpvp_matchplayed";
    const CASUAL_MATCHWINLOSS = "casualpvp_matchwlratio";
    const CASUAL_MATCHWON = "casualpvp_matchwon";
    const CASUAL_TIMEPLAYED = "casualpvp_timeplayed";

    /**
     * Mode: Custom
     */
    const CUSTOM_TIMEPLAYED = "custompvp_timeplayed";

    /**
     * Mode: PvE
     * Object: Gadget
     */
    const GADGETPVE_CHOSEN = "gadgetpve_chosen";
    const GADGETPVE_GADGETDESTROY = "gadgetpve_gadgetdestroy";
    const GADGETPVE_KILLS = "gadgetpve_kills";
    const GADGETPVE_MOSTUSED = "gadgetpve_mostused";

    /**
     * Mode: PvP
     * Object: Gadget
     */
    const GADGETPVP_CHOSEN = "gadgetpvp_chosen";
    const GADGETPVP_GADGETDESTROY = "gadgetpvp_gadgetdestroy";
    const GADGETPVP_KILLS = "gadgetpvp_kills";
    const GADGETPVP_MOSTUSED = "gadgetpvp_mostused";

    /**
     * ??
     */
    const OPERATORPVP_MATCHLOST = "gamemodeoperatorpvp_matchlost";
    const OPERATORPVP_MATCHPLAYED = "gamemodeoperatorpvp_matchplayed";
    const OPERATORPVP_MATCHWINLOSS = "gamemodeoperatorpvp_matchwlratio";
    const OPERATORPVP_MATCHWON = "gamemodeoperatorpvp_matchwon";

    /**
     * Mode: PvE
     */
    const GENERALPVE_ACCURACY = "generalpve_accuracy";
    const GENERALPVE_BARRICADEDEPLOYED = "generalpve_barricadedeployed";
    const GENERALPVE_BLINDKILLS = "generalpve_blindkills";
    const GENERALPVE_BULLETFIRED = "generalpve_bulletfired";
    const GENERALPVE_BULLETHIT = "generalpve_bullethit";
    const GENERALPVE_DBNO = "generalpve_dbno";
    const GENERALPVE_DBNOASSISTS = "generalpve_dbnoassists";
    const GENERALPVE_DEATH = "generalpve_death";
    const GENERALPVE_DISTANCETRAVELLED = "generalpve_distancetravelled";
    const GENERALPVE_GADGETDESTROY = "generalpve_gadgetdestroy";
    const GENERALPVE_HEADSHOT = "generalpve_headshot";
    const GENERALPVE_HOSTAGEDEFENSE = "generalpve_hostagedefense";
    const GENERALPVE_HOSTAGERESCUE = "generalpve_hostagerescue";
    const GENERALPVE_KDRATIO = "generalpve_kdratio";
    const GENERALPVE_KILLASSISTS = "generalpve_killassists";
    const GENERALPVE_KILLS = "generalpve_kills";
    const GENERALPVE_MATCHLOST = "generalpve_matchlost";
    const GENERALPVE_MATCHPLAYED = "generalpve_matchplayed";
    const GENERALPVE_MATCHWINLOSS = "generalpve_matchwlratio";
    const GENERALPVE_MATCHWON = "generalpve_matchwon";
    const GENERALPVE_MELEEKILLS = "generalpve_meleekills";
    const GENERALPVE_PENETRATIONKILLS = "generalpve_penetrationkills";
    const GENERALPVE_RAPPELBREACH = "generalpve_rappelbreach";
    const GENERALPVE_REINFORCEMENTDEPLOY = "generalpve_reinforcementdeploy";
    const GENERALPVE_REVIVE = "generalpve_revive";
    const GENERALPVE_REVIVEDENIED = "generalpve_revivedenied";
    const GENERALPVE_SERVERAGGRESSION = "generalpve_serveraggression";
    const GENERALPVE_SERVERDEFENDER = "generalpve_serverdefender";
    const GENERALPVE_SERVERHACKED = "generalpve_servershacked";
    const GENERALPVE_SUICIDE = "generalpve_suicide";
    const GENERALPVE_TIMEPLAYED = "generalpve_timeplayed";
    const GENERALPVE_TOTALXP = "generalpve_totalxp";

    /**
     * Mode: PvP
     */
    const GENERALPVP_ACCURACY = "generalpvp_accuracy";
    const GENERALPVP_BARRICADEDEPLOYED = "generalpvp_barricadedeployed";
    const GENERALPVP_BLINDKILLS = "generalpvp_blindkills";
    const GENERALPVP_BULLETFIRED = "generalpvp_bulletfired";
    const GENERALPVP_BULLETHIT = "generalpvp_bullethit";
    const GENERALPVP_DBNO = "generalpvp_dbno";
    const GENERALPVP_DBNOASSISTS = "generalpvp_dbnoassists";
    const GENERALPVP_DEATH = "generalpvp_death";
    const GENERALPVP_DISTANCETRAVELLED = "generalpvp_distancetravelled";
    const GENERALPVP_GADGETDESTROY = "generalpvp_gadgetdestroy";
    const GENERALPVP_HEADSHOT = "generalpvp_headshot";
    const GENERALPVP_HOSTAGEDEFENSE = "generalpvp_hostagedefense";
    const GENERALPVP_HOSTAGERESCUE = "generalpvp_hostagerescue";
    const GENERALPVP_KDRATIO = "generalpvp_kdratio";
    const GENERALPVP_KILLASSISTS = "generalpvp_killassists";
    const GENERALPVP_KILLS = "generalpvp_kills";
    const GENERALPVP_MATCHLOST = "generalpvp_matchlost";
    const GENERALPVP_MATCHPLAYED = "generalpvp_matchplayed";
    const GENERALPVP_MATCHWINLOSS = "generalpvp_matchwlratio";
    const GENERALPVP_MATCHWON = "generalpvp_matchwon";
    const GENERALPVP_MELEEKILLS = "generalpvp_meleekills";
    const GENERALPVP_PENETRATIONKILLS = "generalpvp_penetrationkills";
    const GENERALPVP_RAPPELBREACH = "generalpvp_rappelbreach";
    const GENERALPVP_REINFORCEMENTDEPLOY = "generalpvp_reinforcementdeploy";
    const GENERALPVP_REVIVE = "generalpvp_revive";
    const GENERALPVP_REVIVEDENIED = "generalpvp_revivedenied";
    const GENERALPVP_SERVERAGGRESSION = "generalpvp_serveraggression";
    const GENERALPVP_SERVERDEFENDER = "generalpvp_serverdefender";
    const GENERALPVP_SERVERHACKED = "generalpvp_servershacked";
    const GENERALPVP_SUICIDE = "generalpvp_suicide";
    const GENERALPVP_TIMEPLAYED = "generalpvp_timeplayed";
    const GENERALPVP_TOTALXP = "generalpvp_totalxp";

    const KARMA_RANK = "karma_rank";

    const MISSIONCOOP_HARD_BESTSCORE = "missioncoop_hard_bestscore";
    const MISSIONCOOP_NORMAL_BESTSCORE = "missioncoop_normal_bestscore";
    const MISSIONCOOP_REALISTIC_BESTSCORE = "missioncoop_realistic_bestscore";
    const MISSIONSBYPLAYLISTPVE_BESTSCORE = "missionsbyplaylistpve_bestscore";
    const MISSIONSOLO_HARD_BESTSCORE = "missionsolo_hard_bestscore";
    const MISSIONSOLO_NORMAL_BESTSCORE = "missionsolo_normal_bestscore";
    const MISSIONSOLO_REALISTIC_BESTSCORE = "missionsolo_realistic_bestscore";

    const NORMALPVP_MATCHLOST = "normalpvp_matchlost";
    const NORMALPVP_MATCHPLAYED = "normalpvp_matchplayed";
    const NORMALPVP_MATCHWLRATIO = "normalpvp_matchwlratio";
    const NORMALPVP_MATCHWON = "normalpvp_matchwon";
    const NORMALPVP_TIMEPLAYED = "normalpvp_timeplayed";

    const OPERATORPVE_ASH_BONFIREKILL = "operatorpve_ash_bonfirekill";
    const OPERATORPVE_ASH_BONFIREWALLBREACHED = "operatorpve_ash_bonfirewallbreached";
    const OPERATORPVE_BANDIT_BATTERYKILL = "operatorpve_bandit_batterykill";
    const OPERATORPVE_BLACK_MIRROR_GADGET_DEPLOYED = "operatorpve_black_mirror_gadget_deployed";
    const OPERATORPVE_BLACKBEARD_GUNSHIELDBLOCKDAMAGE = "operatorpve_blackbeard_gunshieldblockdamage";
    const OPERATORPVE_BLITZ_FLASHEDENEMY = "operatorpve_blitz_flashedenemy";
    const OPERATORPVE_BLITZ_FLASHFOLLOWUPKILLS = "operatorpve_blitz_flashfollowupkills";
    const OPERATORPVE_BLITZ_FLASHSHIELDASSIST = "operatorpve_blitz_flashshieldassist";
    const OPERATORPVE_BUCK_KILL = "operatorpve_buck_kill";
    const OPERATORPVE_CAPITAO_LETHALDARTKILLS = "operatorpve_capitao_lethaldartkills";
    const OPERATORPVE_CAPITAO_SMOKEDARTSLAUNCHED = "operatorpve_capitao_smokedartslaunched";
    const OPERATORPVE_CASTLE_KEVLARBARRICADEDEPLOYED = "operatorpve_castle_kevlarbarricadedeployed";
    const OPERATORPVE_CAVEIRA_AIKILLEDINSTEALTH = "operatorpve_caveira_aikilledinstealth";
    const OPERATORPVE_CAZADOR_ASSIST_KILL = "operatorpve_cazador_assist_kill";
    const OPERATORPVE_DBNO = "operatorpve_dbno";
    const OPERATORPVE_DEATH = "operatorpve_death";
    const OPERATORPVE_DOC_HOSTAGEREVIVE = "operatorpve_doc_hostagerevive";
    const OPERATORPVE_DOC_SELFREVIVE = "operatorpve_doc_selfrevive";
    const OPERATORPVE_DOC_TEAMMATEREVIVE = "operatorpve_doc_teammaterevive";
    const OPERATORPVE_ECHO_ENEMY_SONICBURST_AFFECTED = "operatorpve_echo_enemy_sonicburst_affected";
    const OPERATORPVE_FROST_BEARTRAP_KILL = "operatorpve_frost_beartrap_kill";
    const OPERATORPVE_FUZE_CLUSTERCHARGEKILL = "operatorpve_fuze_clusterchargekill";
    const OPERATORPVE_GLAZ_SNIPERKILL = "operatorpve_glaz_sniperkill";
    const OPERATORPVE_GLAZ_SNIPERPENETRATIONKILL = "operatorpve_glaz_sniperpenetrationkill";
    const OPERATORPVE_HEADSHOT = "operatorpve_headshot";
    const OPERATORPVE_HIBANA_DETONATE_PROJECTILE = "operatorpve_hibana_detonate_projectile";
    const OPERATORPVE_IQ_GADGETSPOTBYEF = "operatorpve_iq_gadgetspotbyef";
    const OPERATORPVE_JAGER_GADGETDESTROYBYCATCHER = "operatorpve_jager_gadgetdestroybycatcher";
    const OPERATORPVE_KAPKAN_BOOBYTRAPDEPLOYED = "operatorpve_kapkan_boobytrapdeployed";
    const OPERATORPVE_KAPKAN_BOOBYTRAPKILL = "operatorpve_kapkan_boobytrapkill";
    const OPERATORPVE_KDRATIO = "operatorpve_kdratio";
    const OPERATORPVE_KILLS = "operatorpve_kills";
    const OPERATORPVE_MELEEKILLS = "operatorpve_meleekills";
    const OPERATORPVE_MONTAGNE_SHIELDBLOCKDAMAGE = "operatorpve_montagne_shieldblockdamage";
    const OPERATORPVE_MOSTUSED = "operatorpve_mostused";
    const OPERATORPVE_MUTE_GADGETJAMMED = "operatorpve_mute_gadgetjammed";
    const OPERATORPVE_MUTE_JAMMERDEPLOYED = "operatorpve_mute_jammerdeployed";
    const OPERATORPVE_PULSE_HEARTBEATASSIST = "operatorpve_pulse_heartbeatassist";
    const OPERATORPVE_PULSE_HEARTBEATSPOT = "operatorpve_pulse_heartbeatspot";
    const OPERATORPVE_ROOK_ARMORBOXDEPLOYED = "operatorpve_rook_armorboxdeployed";
    const OPERATORPVE_ROOK_ARMORTAKENOURSELF = "operatorpve_rook_armortakenourself";
    const OPERATORPVE_ROOK_ARMORTAKENTEAMMATE = "operatorpve_rook_armortakenteammate";
    const OPERATORPVE_ROUNDLOST = "operatorpve_roundlost";
    const OPERATORPVE_ROUNDPLAYED = "operatorpve_roundplayed";
    const OPERATORPVE_ROUNDWLRATIO = "operatorpve_roundwlratio";
    const OPERATORPVE_ROUNDWON = "operatorpve_roundwon";
    const OPERATORPVE_SLEDGE_HAMMERHOLE = "operatorpve_sledge_hammerhole";
    const OPERATORPVE_SLEDGE_HAMMERKILL = "operatorpve_sledge_hammerkill";
    const OPERATORPVE_SMOKE_POISONGASKILL = "operatorpve_smoke_poisongaskill";
    const OPERATORPVE_TACHANKA_TURRETDEPLOYED = "operatorpve_tachanka_turretdeployed";
    const OPERATORPVE_TACHANKA_TURRETKILL = "operatorpve_tachanka_turretkill";
    const OPERATORPVE_THATCHER_GADGETDESTROYWITHEMP = "operatorpve_thatcher_gadgetdestroywithemp";
    const OPERATORPVE_THERMITE_CHARGEDEPLOYED = "operatorpve_thermite_chargedeployed";
    const OPERATORPVE_THERMITE_CHARGEKILL = "operatorpve_thermite_chargekill";
    const OPERATORPVE_THERMITE_REINFORCEMENTBREACHED = "operatorpve_thermite_reinforcementbreached";
    const OPERATORPVE_TIMEPLAYED = "operatorpve_timeplayed";
    const OPERATORPVE_TOTALXP = "operatorpve_totalxp";
    const OPERATORPVE_TWITCH_GADGETDESTROYBYSHOCKDRONE = "operatorpve_twitch_gadgetdestroybyshockdrone";
    const OPERATORPVE_TWITCH_SHOCKDRONEKILL = "operatorpve_twitch_shockdronekill";
    const OPERATORPVE_VALKYRIE_CAMDEPLOYED = "operatorpve_valkyrie_camdeployed";

    const OPERATORPVP_ASH_BONFIREKILL = "operatorpvp_ash_bonfirekill";
    const OPERATORPVP_ASH_BONFIREWALLBREACHED = "operatorpvp_ash_bonfirewallbreached";
    const OPERATORPVP_BANDIT_BATTERYKILL = "operatorpvp_bandit_batterykill";
    const OPERATORPVP_BLACK_MIRROR_GADGET_DEPLOYED = "operatorpvp_black_mirror_gadget_deployed";
    const OPERATORPVP_BLACKBEARD_GUNSHIELDBLOCKDAMAGE = "operatorpvp_blackbeard_gunshieldblockdamage";
    const OPERATORPVP_BLITZ_FLASHEDENEMY = "operatorpvp_blitz_flashedenemy";
    const OPERATORPVP_BLITZ_FLASHFOLLOWUPKILLS = "operatorpvp_blitz_flashfollowupkills";
    const OPERATORPVP_BLITZ_FLASHSHIELDASSIST = "operatorpvp_blitz_flashshieldassist";
    const OPERATORPVP_BUCK_KILL = "operatorpvp_buck_kill";
    const OPERATORPVP_CAPITAO_LETHALDARTKILLS = "operatorpvp_capitao_lethaldartkills";
    const OPERATORPVP_CAPITAO_SMOKEDARTSLAUNCHED = "operatorpvp_capitao_smokedartslaunched";
    const OPERATORPVP_CASTLE_KEVLARBARRICADEDEPLOYED = "operatorpvp_castle_kevlarbarricadedeployed";
    const OPERATORPVP_CAVEIRA_INTERROGATIONS = "operatorpvp_caveira_interrogations";
    const OPERATORPVP_CAZADOR_ASSIST_KILL = "operatorpvp_cazador_assist_kill";
    const OPERATORPVP_DBNO = "operatorpvp_dbno";
    const OPERATORPVP_DEATH = "operatorpvp_death";
    const OPERATORPVP_DOC_HOSTAGEREVIVE = "operatorpvp_doc_hostagerevive";
    const OPERATORPVP_DOC_SELFREVIVE = "operatorpvp_doc_selfrevive";
    const OPERATORPVP_DOC_TEAMMATEREVIVE = "operatorpvp_doc_teammaterevive";
    const OPERATORPVP_ECHO_ENEMY_SONICBURST_AFFECTED = "operatorpvp_echo_enemy_sonicburst_affected";
    const OPERATORPVP_FROST_DBNO = "operatorpvp_frost_dbno";
    const OPERATORPVP_FUZE_CLUSTERCHARGEKILL = "operatorpvp_fuze_clusterchargekill";
    const OPERATORPVP_GLAZ_SNIPERKILL = "operatorpvp_glaz_sniperkill";
    const OPERATORPVP_GLAZ_SNIPERPENETRATIONKILL = "operatorpvp_glaz_sniperpenetrationkill";
    const OPERATORPVP_HEADSHOT = "operatorpvp_headshot";
    const OPERATORPVP_HIBANA_DETONATE_PROJECTILE = "operatorpvp_hibana_detonate_projectile";
    const OPERATORPVP_IQ_GADGETSPOTBYEF = "operatorpvp_iq_gadgetspotbyef";
    const OPERATORPVP_JAGER_GADGETDESTROYBYCATCHER = "operatorpvp_jager_gadgetdestroybycatcher";
    const OPERATORPVP_KAPKAN_BOOBYTRAPDEPLOYED = "operatorpvp_kapkan_boobytrapdeployed";
    const OPERATORPVP_KAPKAN_BOOBYTRAPKILL = "operatorpvp_kapkan_boobytrapkill";
    const OPERATORPVP_KDRATIO = "operatorpvp_kdratio";
    const OPERATORPVP_KILLS = "operatorpvp_kills";
    const OPERATORPVP_MELEEKILLS = "operatorpvp_meleekills";
    const OPERATORPVP_MONTAGNE_SHIELDBLOCKDAMAGE = "operatorpvp_montagne_shieldblockdamage";
    const OPERATORPVP_MOSTUSED = "operatorpvp_mostused";
    const OPERATORPVP_MUTE_GADGETJAMMED = "operatorpvp_mute_gadgetjammed";
    const OPERATORPVP_MUTE_JAMMERDEPLOYED = "operatorpvp_mute_jammerdeployed";
    const OPERATORPVP_PULSE_HEARTBEATASSIST = "operatorpvp_pulse_heartbeatassist";
    const OPERATORPVP_PULSE_HEARTBEATSPOT = "operatorpvp_pulse_heartbeatspot";
    const OPERATORPVP_ROOK_ARMORBOXDEPLOYED = "operatorpvp_rook_armorboxdeployed";
    const OPERATORPVP_ROOK_ARMORTAKENOURSELF = "operatorpvp_rook_armortakenourself";
    const OPERATORPVP_ROOK_ARMORTAKENTEAMMATE = "operatorpvp_rook_armortakenteammate";
    const OPERATORPVP_ROUNDLOST = "operatorpvp_roundlost";
    const OPERATORPVP_ROUNDPLAYED = "operatorpvp_roundplayed";
    const OPERATORPVP_ROUNDWLRATIO = "operatorpvp_roundwlratio";
    const OPERATORPVP_ROUNDWON = "operatorpvp_roundwon";
    const OPERATORPVP_SLEDGE_HAMMERHOLE = "operatorpvp_sledge_hammerhole";
    const OPERATORPVP_SLEDGE_HAMMERKILL = "operatorpvp_sledge_hammerkill";
    const OPERATORPVP_SMOKE_POISONGASKILL = "operatorpvp_smoke_poisongaskill";
    const OPERATORPVP_TACHANKA_TURRETDEPLOYED = "operatorpvp_tachanka_turretdeployed";
    const OPERATORPVP_TACHANKA_TURRETKILL = "operatorpvp_tachanka_turretkill";
    const OPERATORPVP_THATCHER_GADGETDESTROYWITHEMP = "operatorpvp_thatcher_gadgetdestroywithemp";
    const OPERATORPVP_THERMITE_CHARGEDEPLOYED = "operatorpvp_thermite_chargedeployed";
    const OPERATORPVP_THERMITE_CHARGEKILL = "operatorpvp_thermite_chargekill";
    const OPERATORPVP_THERMITE_REINFORCEMENTBREACHED = "operatorpvp_thermite_reinforcementbreached";
    const OPERATORPVP_TIMEPLAYED = "operatorpvp_timeplayed";
    const OPERATORPVP_TOTALXP = "operatorpvp_totalxp";
    const OPERATORPVP_TWITCH_GADGETDESTROYBYSHOCKDRONE = "operatorpvp_twitch_gadgetdestroybyshockdrone";
    const OPERATORPVP_TWITCH_SHOCKDRONEKILL = "operatorpvp_twitch_shockdronekill";
    const OPERATORPVP_VALKYRIE_CAMDEPLOYED = "operatorpvp_valkyrie_camdeployed";

    const PLANTBOMBPVE_BESTSCORE = "plantbombpve_bestscore";
    const PLANTBOMBPVE_MATCHLOST = "plantbombpve_matchlost";
    const PLANTBOMBPVE_MATCHPLAYED = "plantbombpve_matchplayed";
    const PLANTBOMBPVE_MATCHWLRATIO = "plantbombpve_matchwlratio";
    const PLANTBOMBPVE_MATCHWON = "plantbombpve_matchwon";
    const PLANTBOMBPVE_TIMEPLAYED = "plantbombpve_timeplayed";

    const PLANTBOMBPVP_BESTSCORE = "plantbombpvp_bestscore";
    const PLANTBOMBPVP_MATCHLOST = "plantbombpvp_matchlost";
    const PLANTBOMBPVP_MATCHPLAYED = "plantbombpvp_matchplayed";
    const PLANTBOMBPVP_MATCHWLRATIO = "plantbombpvp_matchwlratio";
    const PLANTBOMBPVP_MATCHWON = "plantbombpvp_matchwon";
    const PLANTBOMBPVP_TIMEPLAYED = "plantbombpvp_timeplayed";
    const PLANTBOMBPVP_TOTALXP = "plantbombpvp_totalxp";

    const PROGRESSION_LEVEL = "progression_level";
    const PROGRESSION_RENOWN = "progression_renown";
    const PROGRESSION_XP = "progression_xp";

    const PROTECTHOSTAGEPVE_BESTSCORE = "protecthostagepve_bestscore";
    const PROTECTHOSTAGEPVE_HOSTAGEDEFENSE = "protecthostagepve_hostagedefense";
    const PROTECTHOSTAGEPVE_HOSTAGERESCUE = "protecthostagepve_hostagerescue";
    const PROTECTHOSTAGEPVE_MATCHLOST = "protecthostagepve_matchlost";
    const PROTECTHOSTAGEPVE_MATCHPLAYED = "protecthostagepve_matchplayed";
    const PROTECTHOSTAGEPVE_MATCHWLRATIO = "protecthostagepve_matchwlratio";
    const PROTECTHOSTAGEPVE_MATCHWON = "protecthostagepve_matchwon";
    const PROTECTHOSTAGEPVE_TIMEPLAYED = "protecthostagepve_timeplayed";

    const RANKEDPVP_DEATH = "rankedpvp_death";
    const RANKEDPVP_KDRATIO = "rankedpvp_kdratio";
    const RANKEDPVP_KILLS = "rankedpvp_kills";
    const RANKEDPVP_MATCHLOST = "rankedpvp_matchlost";
    const RANKEDPVP_MATCHPLAYED = "rankedpvp_matchplayed";
    const RANKEDPVP_MATCHWLRATIO = "rankedpvp_matchwlratio";
    const RANKEDPVP_MATCHWON = "rankedpvp_matchwon";
    const RANKEDPVP_TIMEPLAYED = "rankedpvp_timeplayed";

    const RESCUEHOSTAGEPVE_BESTSCORE = "rescuehostagepve_bestscore";
    const RESCUEHOSTAGEPVE_HOSTAGEDEFENSE = "rescuehostagepve_hostagedefense";
    const RESCUEHOSTAGEPVE_HOSTAGERESCUE = "rescuehostagepve_hostagerescue";
    const RESCUEHOSTAGEPVE_MATCHLOST = "rescuehostagepve_matchlost";
    const RESCUEHOSTAGEPVE_MATCHPLAYED = "rescuehostagepve_matchplayed";
    const RESCUEHOSTAGEPVE_MATCHWLRATIO = "rescuehostagepve_matchwlratio";
    const RESCUEHOSTAGEPVE_MATCHWON = "rescuehostagepve_matchwon";
    const RESCUEHOSTAGEPVE_TIMEPLAYED = "rescuehostagepve_timeplayed";

    const RESCUEHOSTAGEPVP_BESTSCORE = "rescuehostagepvp_bestscore";
    const RESCUEHOSTAGEPVP_MATCHLOST = "rescuehostagepvp_matchlost";
    const RESCUEHOSTAGEPVP_MATCHPLAYED = "rescuehostagepvp_matchplayed";
    const RESCUEHOSTAGEPVP_MATCHWLRATIO = "rescuehostagepvp_matchwlratio";
    const RESCUEHOSTAGEPVP_MATCHWON = "rescuehostagepvp_matchwon";
    const RESCUEHOSTAGEPVP_TOTALXP = "rescuehostagepvp_totalxp";

    const SECUREAREAPVE_BESTSCORE = "secureareapve_bestscore";
    const SECUREAREAPVE_MATCHLOST = "secureareapve_matchlost";
    const SECUREAREAPVE_MATCHPLAYED = "secureareapve_matchplayed";
    const SECUREAREAPVE_MATCHWLRATIO = "secureareapve_matchwlratio";
    const SECUREAREAPVE_MATCHWON = "secureareapve_matchwon";
    const SECUREAREAPVE_SERVERAGGRESSION = "secureareapve_serveraggression";
    const SECUREAREAPVE_SERVERDEFENDER = "secureareapve_serverdefender";
    const SECUREAREAPVE_SERVERSHACKED = "secureareapve_servershacked";
    const SECUREAREAPVE_TIMEPLAYED = "secureareapve_timeplayed";

    const SECUREAREAPVP_BESTSCORE = "secureareapvp_bestscore";
    const SECUREAREAPVP_MATCHLOST = "secureareapvp_matchlost";
    const SECUREAREAPVP_MATCHPLAYED = "secureareapvp_matchplayed";
    const SECUREAREAPVP_MATCHWLRATIO = "secureareapvp_matchwlratio";
    const SECUREAREAPVP_MATCHWON = "secureareapvp_matchwon";
    const SECUREAREAPVP_TOTALXP = "secureareapvp_totalxp";

    const TERROHUNTCLASSICPVE_BESTSCORE = "terrohuntclassicpve_bestscore";
    const TERROHUNTCLASSICPVE_MATCHLOST = "terrohuntclassicpve_matchlost";
    const TERROHUNTCLASSICPVE_MATCHPLAYED = "terrohuntclassicpve_matchplayed";
    const TERROHUNTCLASSICPVE_MATCHWLRATIO = "terrohuntclassicpve_matchwlratio";
    const TERROHUNTCLASSICPVE_MATCHWON = "terrohuntclassicpve_matchwon";
    const TERROHUNTCLASSICPVE_TIMEPLAYED = "terrohuntclassicpve_timeplayed";

    const WEAPONPVE_MOSTKILLS = "weaponpve_mostkills";
    const WEAPONPVE_MOSTUSED = "weaponpve_mostused";
    const WEAPONPVP_MOSTKILLS = "weaponpvp_mostkills";
    const WEAPONPVP_MOSTUSED = "weaponpvp_mostused";

    const WEAPONTYPEPVE_ACCURACY = "weapontypepve_accuracy";
    const WEAPONTYPEPVE_BULLETFIRED = "weapontypepve_bulletfired";
    const WEAPONTYPEPVE_BULLETHIT = "weapontypepve_bullethit";
    const WEAPONTYPEPVE_CHOSEN = "weapontypepve_chosen";
    const WEAPONTYPEPVE_DBNO = "weapontypepve_dbno";
    const WEAPONTYPEPVE_DBNOASSISTS = "weapontypepve_dbnoassists";
    const WEAPONTYPEPVE_DEATH = "weapontypepve_death";
    const WEAPONTYPEPVE_DEATHS = "weapontypepve_deaths";
    const WEAPONTYPEPVE_EFFICIENCY = "weapontypepve_efficiency";
    const WEAPONTYPEPVE_HEADSHOT = "weapontypepve_headshot";
    const WEAPONTYPEPVE_HEADSHOTRATIO = "weapontypepve_headshotratio";
    const WEAPONTYPEPVE_KDRATIO = "weapontypepve_kdratio";
    const WEAPONTYPEPVE_KILLASSISTS = "weapontypepve_killassists";
    const WEAPONTYPEPVE_KILLS = "weapontypepve_kills";
    const WEAPONTYPEPVE_MOSTKILLS = "weapontypepve_mostkills";
    const WEAPONTYPEPVE_POWER = "weapontypepve_power";

    const WEAPONTYPEPVP_ACCURACY = "weapontypepvp_accuracy";
    const WEAPONTYPEPVP_BULLETFIRED = "weapontypepvp_bulletfired";
    const WEAPONTYPEPVP_BULLETHIT = "weapontypepvp_bullethit";
    const WEAPONTYPEPVP_CHOSEN = "weapontypepvp_chosen";
    const WEAPONTYPEPVP_DBNO = "weapontypepvp_dbno";
    const WEAPONTYPEPVP_DBNOASSISTS = "weapontypepvp_dbnoassists";
    const WEAPONTYPEPVP_DEATH = "weapontypepvp_death";
    const WEAPONTYPEPVP_DEATHS = "weapontypepvp_deaths";
    const WEAPONTYPEPVP_EFFICIENCY = "weapontypepvp_efficiency";
    const WEAPONTYPEPVP_HEADSHOT = "weapontypepvp_headshot";
    const WEAPONTYPEPVP_HEADSHOTRATIO = "weapontypepvp_headshotratio";
    const WEAPONTYPEPVP_KDRATIO = "weapontypepvp_kdratio";
    const WEAPONTYPEPVP_KILLASSISTS = "weapontypepvp_killassists";
    const WEAPONTYPEPVP_KILLS = "weapontypepvp_kills";
    const WEAPONTYPEPVP_MOSTKILLS = "weapontypepvp_mostkills";
    const WEAPONTYPEPVP_POWER = "weapontypepvp_power";
}
