<x-app-layout>

    <x-header>

        <p>
            <a href="{{ route('albums.index') }}">Albums</a>
            <span> - {{ $album->title }}</span>
            <a href="{{ route('albums.images.index', $album) }}">- Images</a>
        </p>

       Images create
    </x-header>

    <x-card>
        <form action="{{ route('albums.images.store', $album) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id" value="{{ $album->id }}">

            <p>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="block border-2 rounded-md">
                @error('title')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </p>

            <div>
                <label for="description" class="mt-10">Description</label>
                <textarea name="description" cols="60" rows="5" class="block border-2 rounded-md">{{ old('description') }}</textarea>
                 @error('description')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3">
                <label for="image_file_path">Cover Image</label>
                <input type="file" name="image_file_path" class="block">
                @error('image_file_path'){{ $message }}@enderror
            </div>

            <div>
                <x-primary-button class="mt-5">Submit</x-primary-button>
            </div>
        </form>
    </x-card>

</x-app-layout>

