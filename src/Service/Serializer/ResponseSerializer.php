<?php

namespace App\Service\Serializer;

use App\Dto\ResponseDto;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ResponseSerializer
{
    public const JSON_ENCODE_OPTIONS = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;

    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function serialize(ResponseDto $dto): string
    {
        $serialized = $this->serializer->serialize($dto, JsonEncoder::FORMAT, [
            JsonEncode::OPTIONS => ResponseSerializer::JSON_ENCODE_OPTIONS,
            AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
        ]);

        if (!$serialized) {
            throw new \Exception('Unable to serialize the data');
        }

        return $serialized;
    }
}
