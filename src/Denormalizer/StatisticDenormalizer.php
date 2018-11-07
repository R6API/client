<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Statistic;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class StatisticDenormalizer implements DenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $statistic = new Statistic();

        $statistic->profileId = Uuid::fromString($data['player']);
        unset($data['player']);

        foreach ($data as $key => $value) {
            $key = str_replace(':infinite', '', $key);
            $statistic->statistics[$key] = $value;
        }

        return $statistic;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        $supports = false;
        if (Statistic::class === $type) {
            $supports = true;
        }

        return $supports;
    }
}
