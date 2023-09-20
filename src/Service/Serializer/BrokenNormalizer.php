<?php

namespace App\Service\Serializer;

use App\Dto\ResponseDto;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BrokenNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($responseDto, string $format = null, array $context = [])
    {
        // Debugger shows that the normalizer class is Symfony\Component\Serializer\Serializer.
        // The following method call fails with the error:
        //
        //      "unable to fetch the response from the backend: unexpected EOF"

        $data = $this->normalizer->normalize($responseDto, $format, $context);

        // This line isn't reached, but we'd otherwise do something with the
        // data before returning a modified version.

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof ResponseDto;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            ResponseDto::class => true,
        ];
    }
}
