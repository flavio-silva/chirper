<?php

namespace App\Repositories;

use App\Dtos\ChirpDto;
use App\Models\Chirp;

final class ChirpRepository implements ChirpRepositoryContract
{
    public function __construct(private Chirp $model)
    {
    }
    public function findAll(): array
    {
        return $this->model->with('user:id,name')
            ->latest()
            ->get()
            ->toArray();
    }

    public function create(ChirpDto $data): Chirp
    {
        $chirp = new Chirp();
        $chirp->message = $data->message;
        $chirp->user_id = $data->user_id;

        $chirp->save();

        return $chirp->fresh();
    }


    public function update(int $id, ChirpDto $data): Chirp
    {
        $chirp = $this->model->findOrFail($id);

        $chirp->message = $data->message;
        $chirp->user_id = $data->user_id;

        $chirp->save();

        return $chirp->fresh();
    }


    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}
