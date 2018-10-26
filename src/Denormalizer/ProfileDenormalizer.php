<?php
declare(strict_types=1);

namespace R6API\Client\Denormalizer;

use R6API\Client\Api\Type\PlatformType;
use R6API\Client\Model\Profile;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProfileDenormalizer implements DenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $profile = new Profile();

        $profile->profileId = Uuid::fromString($data['profileId']);
        $profile->userId = Uuid::fromString($data['userId']);
        $profile->idOnPlatform = Uuid::fromString($data['idOnPlatform']);

        $platformType = str_replace('_PROFILES_', '', PlatformType::getKeysFromValue($data['platformType']));
        $profile->platformType = $platformType;

        $profile->nameOnPlatform = $data['nameOnPlatform'];

        return $profile;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        $supports = false;
        if (Profile::class === $type) {
            $supports = true;
        }

        return $supports;
    }
}
