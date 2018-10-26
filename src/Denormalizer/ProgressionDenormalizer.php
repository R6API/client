<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Progression;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProgressionDenormalizer implements DenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $progression = new Progression();

        $progression->xp = $data['xp'];
        $progression->profileId = Uuid::fromString($data['profile_id']);
        $progression->lootboxProbability = $data['lootbox_probability'];
        $progression->level = $data['level'];

        return $progression;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        if (Progression::class === $type) {
            return true;
        }

        return false;
    }
}
