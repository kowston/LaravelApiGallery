<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Images\StoreRequest;
use App\Http\Requests\Images\UpdateRequest;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ImagesController extends Controller
{
    public function index(Album $album): View
    {
        $images = Image::where('album_id', $album->id)->paginate();

        return view('admin.albums.images.index', compact('album', 'images'));
    }

    public function create(Album $album): View
    {
        return view('admin.albums.images.create', compact('album'));
    }

    public function store(StoreRequest $request, Album $album): RedirectResponse
    {
        $data = $request->validated();

        $imageName = resize_uploaded_image(
            $request,
            'image_file_path',
            $data['image_file_path'],
            'images/'
        );

        $data['image_file_path'] = $imageName;

        Image::create($data);

        return to_route('albums.images.index', compact('album'));
    }

    public function edit(Album $album, image $image): View
    {
        return view('admin.albums.images.edit', compact('album','image'));
    }

    public function update(UpdateRequest $request, Album $album, image $image): RedirectResponse
    {
        $data = $request->validated();

        if(isset($data['image_file_path'])) {
            $imageName = resize_uploaded_image(
                $request,
                'image_file_path',
                $data['image_file_path'],
                'images/'
            );

            $data['image_file_path'] = $imageName;
        }

        $image->update($data);

        return to_route('albums.images.index', compact('album'));
    }

    public function destroy(Album $album, image $image): RedirectResponse
    {
        $image->delete();

        return to_route('albums.image.index', compact('album'));
    }
}
