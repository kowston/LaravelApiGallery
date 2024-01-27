<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreRequest;
use App\Http\Requests\Api\UpdateRequest;
use App\Http\Resources\Api\AlbumsCollection;
use App\Http\Resources\Api\AlbumsResource;
use App\Models\Album;
use Illuminate\Http\Response;

class AlbumsController extends Controller
{
    public function index(): AlbumsCollection
    {
        $albums = Album::paginate();

        return new AlbumsCollection($albums);
    }

    public function store(StoreRequest $request): AlbumsResource
    {
        $data = $request->validated();

        $album = Album::create($data);

        return new AlbumsResource($album);
    }

    public function show(Album $album): AlbumsResource
    {
        return new AlbumsResource($album);
    }

    public function update(UpdateRequest $request, Album $album): AlbumsResource
    {
        $data = $request->validated();

        $album->update($data);

        return new AlbumsResource($album);
    }

    public function destroy(Album $album): Response
    {
        $album->delete();

        return response()->noContent();
    }
}
