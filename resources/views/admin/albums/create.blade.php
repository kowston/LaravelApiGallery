<x-app-layout>

    <x-header>
       Album create
    </x-header>

    <x-card>
        <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data">
            @csrf

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
            </div>

            <div class="mt-3">
                <label for="cover_file_path">Cover Image</label>
                <input type="file" name="cover_file_path" class="block">
                @error('cover_file_path'){{ $message }}@enderror
            </div>

            <div>
                <x-primary-button class="mt-5">Submit</x-primary-button>
            </div>
        </form>
    </x-card>

</x-app-layout>

