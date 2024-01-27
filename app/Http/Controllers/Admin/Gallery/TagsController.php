<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\StoreRequest;
use App\Http\Requests\Tags\UpdateRequest;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Tag::create($data);

        return to_route('tags.index');
    }

    public function show(tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, tag $tag)
    {
        $data = $request->validated();

        $tag->update($data);

        return to_route('tags.index');
    }

    public function destroy(tag $tag)
    {
        $tag->delete();

        return to_route('tags.index');
    }
}
