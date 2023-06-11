<?php

namespace App\Dtos;

readonly class ChirpDto
{
    public function __construct(
        public string $message,
        public int $user_id,
    ) {
    }
}
