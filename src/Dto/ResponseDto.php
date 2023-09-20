<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ResponseDto
{
    public function __construct(
        #[SerializedName('foo')] public readonly string $foo,
    ) {
    }
}
