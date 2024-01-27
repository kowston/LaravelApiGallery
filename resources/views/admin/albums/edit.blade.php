<x-app-layout>

    <x-header>
       Album edit
    </x-header>

    <x-card>
        <form action="{{ route('albums.update', $album) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <p>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $album->title) }}" class="block border-2 rounded-md">
                @error('title')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </p>

            <div>
                <label for="description" class="mt-10">Description</label>
                <textarea name="description" cols="60" rows="5" class="block border-2 rounded-md">{{ old('description', $album->description) }}</textarea>
                @error('description')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3">
                <label for="cover_file_path">Cover Image</label>
                <input type="file" name="cover_file_path" class="block">
                @error('cover_file_path'){{ $message }}@enderror

                @if(storage_exists($album->cover_file_path))
                    <img class="mt-5 rounded-md" src="{{ storage_url($album->cover_file_path) }}">
                @endif
            </div>

            <div>
                <x-primary-button class="mt-5">Submit</x-primary-button>
            </div>
        </form>
    </x-card>

</x-app-layout>

