<?php

namespace App\Services;

use App\Dtos\ChirpDto;
use App\Models\Chirp;

interface ChirpServiceContract
{
    public function delete(int $id): void;

    public function create(ChirpDto $data): Chirp;

    public function update(int $id, ChirpDto $data): Chirp;

    public function findAll(): array;
}
