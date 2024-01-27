<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Albums\StoreRequest;
use App\Http\Requests\Albums\UpdateRequest;
use App\Models\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::paginate();

        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        //call a global helper from app/Http/helpers.php
        $imageName = resize_uploaded_image(
            $request,
            'cover_file_path',
            $data['cover_file_path'],
            'albums/'
        );

        $data['cover_file_path'] = $imageName;

        Album::create($data);

        return to_route('albums.index');
    }

    public function edit(album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    public function update(UpdateRequest $request, album $album)
    {
        $data = $request->validated();

        if(isset($data['image_file_path'])) {
            //call a global helper from app/Http/helpers.php
            $imageName = resize_uploaded_image(
                $request,
                'cover_file_path',
                $data['cover_file_path'],
                'albums/'
            );

            $data['cover_file_path'] = $imageName;
        }

        $album->update($data);

        return to_route('albums.index');
    }

    public function destroy(album $album)
    {
        $album->delete();

        return to_route('albums.index');
    }
}
