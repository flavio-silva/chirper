<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Chirp;
use App\Dtos\ChirpDto;
use App\Http\Requests\DeleteChirpRequest;
use App\Http\Requests\StoreChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Services\ChirpServiceContract;
use Inertia\Response as Response;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Put;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware(['auth', 'verified'])]
final class ChirpController extends Controller
{
    public function __construct(protected ChirpServiceContract $service)
    {
    }

    #[Get('chirps', name: 'chirps.index')]
    public function index(): Response
    {
        $chirps = $this->service->findAll();

        return Inertia::render('Chirps/Index', [
            'chirps' => $chirps,
        ]);
    }


    #[Post('chirps', name: 'chirps.store')]
    public function store(StoreChirpRequest $request)
    {
        $data = new ChirpDto(...[
            'message' => $request->input('message'),
            'user_id' => $request->user()->id
        ]);

        $this->service->create($data);

        return redirect(route('chirps.index'));
    }

    #[Put('chirps/{chirp}', name: 'chirps.update')]
    public function update(UpdateChirpRequest $request, Chirp $chirp)
    {
        $data = new ChirpDto(...[
            'message' => $request->input('message'),
            'user_id' => $request->user()->id
        ]);

        $this->service->update($chirp->id, $data);

        return redirect(route('chirps.index'));
    }

    #[Delete('chirps/{chirp}', name: 'chirps.destroy')]
    public function destroy(DeleteChirpRequest $request, Chirp $chirp)
    {
        $this->service->delete($chirp->id);

        return redirect(route('chirps.index'));
    }
}
