<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Model\Profile;
use R6API\Client\Model\ProfileResponse;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProfileResponseDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    /** @var DenormalizerInterface */
    private $denormalizer;

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $profiles = [];

        foreach ($data['profiles'] as $profile) {
            $profiles[] = $this->denormalizer->denormalize($profile, Profile::class);
        }

        return $profiles;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        $supports = false;
        if (ProfileResponse::class === $type) {
            $supports = true;
        }

        return $supports;
    }

    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }
}
