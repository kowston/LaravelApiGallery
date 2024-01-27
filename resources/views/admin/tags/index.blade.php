<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="py-5"><a href="{{ route('tags.create') }}" class="bg-blue-700 text-white px-2.5 py-1.5 rounded-md">Create Tag</a></p>

                    <table>
                        <thead>
                            <tr>
                                <th>Tag Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->title }}</td>
                                <td><a href="{{ route('tags.edit', $tag) }}">Edit</a>
                                    <form action="{{ route('tags.destroy', $tag) }}" method="post" onclick="return confirm('Do you want to delete this Tag')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" name="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
