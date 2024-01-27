<x-app-layout>

    <x-header>
       Album edit
    </x-header>

    <x-card>
        <form action="{{ route('tags.update', $tag) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <p>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $tag->title) }}" class="block border-2 rounded-md">
                @error('title')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </p>

            <div>
                <label for="description" class="mt-10">Description</label>
                <textarea name="description" cols="60" rows="5" class="block border-2 rounded-md">{{ old('description', $tag->description) }}</textarea>
                @error('description')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-primary-button class="mt-5">Submit</x-primary-button>
            </div>
        </form>
    </x-card>

</x-app-layout>

