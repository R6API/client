<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Rank;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class RankResponseDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    /** @var DenormalizerInterface */
    private $denormalizer;

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $ranks = [];

        foreach ($data['players'] as $rank) {
            $ranks[] = $this->denormalizer->denormalize($rank, Rank::class);
        }

        return $ranks;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        if (Rank::class.'[]' === $type &&
            isset($data['players'])) {
            return true;
        }

        return false;
    }

    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }
}
