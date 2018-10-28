<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Rank;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class RankDenormalizer implements DenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $rank = new Rank();

        $rank->boardId = $data['board_id'];
        $rank->pastSeasonsAbandons = $data['past_seasons_abandons'];
        $rank->updateTime = $data['update_time'];
        $rank->skillMean = $data['skill_mean'];
        $rank->abandons = $data['abandons'];
        $rank->season = $data['season'];
        $rank->region = $data['region'];
        $rank->profileId = Uuid::fromString($data['profile_id']);
        $rank->pastSeasonsLosses = $data['past_seasons_losses'];
        $rank->maxMmr = $data['max_mmr'];
        $rank->mmr = $data['mmr'];
        $rank->wins = $data['wins'];
        $rank->skillStdev = $data['skill_stdev'];
        $rank->rank = $data['rank'];
        $rank->losses = $data['losses'];
        $rank->nextRankMmr = $data['next_rank_mmr'];
        $rank->pastSeasonsWins = $data['past_seasons_wins'];
        $rank->previousRankMmr = $data['previous_rank_mmr'];
        $rank->maxRank = $data['max_rank'];

        return $rank;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        if (Rank::class === $type) {
            return true;
        }

        return false;
    }
}
