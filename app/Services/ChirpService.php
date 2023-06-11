<?php

namespace App\Services;

use App\Dtos\ChirpDto;
use App\Models\Chirp;
use App\Repositories\ChirpRepositoryContract;

class ChirpService implements ChirpServiceContract
{
    public function __construct(protected ChirpRepositoryContract $repository)
    {
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function create(ChirpDto $data): Chirp
    {
        return $this->repository->create($data);
    }

    public function update(int $id, ChirpDto $data): Chirp
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
