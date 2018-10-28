<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Progression;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProgressionResponseDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    /** @var DenormalizerInterface */
    private $denormalizer;

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $progressions = [];

        foreach ($data['player_profiles'] as $progression) {
            $progressions[] = $this->denormalizer->denormalize($progression, Progression::class);
        }

        return $progressions;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        if (Progression::class.'[]' === $type &&
            isset($data['player_profiles'])) {
            return true;
        }

        return false;
    }

    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }
}
