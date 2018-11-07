<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Statistic;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class StatisticResponseDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    /** @var DenormalizerInterface */
    private $denormalizer;

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $statistics = [];

        foreach ($data['results'] as $player => $statistic) {
            $statistic['player'] = $player;
            $statistics[] = $this->denormalizer->denormalize($statistic, Statistic::class);
        }

        return $statistics;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        if (Statistic::class.'[]' &&
            isset($data['results'])) {
            return true;
        }

        return false;
    }

    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }
}
