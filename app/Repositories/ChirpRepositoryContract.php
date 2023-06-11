<?php

namespace App\Repositories;

use App\Dtos\ChirpDto;
use App\Models\Chirp;

interface ChirpRepositoryContract
{
    public function create(ChirpDto $data): Chirp;

    public function update(int $id, ChirpDto $data): Chirp;

    public function findAll(): array;

    public function delete(int $id): void;
}
