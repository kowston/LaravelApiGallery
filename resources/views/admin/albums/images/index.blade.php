<x-app-layout>

    <x-slot name="header">

        <p>
            <a href="{{ route('albums.index') }}">Albums</a>
            <span> - {{ $album->title }}</span>
        </p>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="py-5"><a href="{{ route('albums.images.create', $album) }}" class="bg-blue-700 text-white px-2.5 py-1.5 rounded-md">New Image</a></p>

                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Album Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $image)
                            <tr>
                                <td class="w-1/12">
                                    @if(storage_exists($image->cover_file_path))
                                        <img class="mt-5 rounded-md w-1/2" src="{{ storage_url($image->cover_file_path) }}">
                                    @endif
                                </td>
                                <td>{{ $image->title }}</td>
                                <td><a href="{{ route('albums.images.edit', [$album, $image]) }}">Edit</a>
                                    <form action="{{ route('albums.images.destroy', [$album, $image]) }}" method="post" onclick="return confirm('Do you want to delete this Album')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" name="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
