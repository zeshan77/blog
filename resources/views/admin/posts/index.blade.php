<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="/admin/posts/create" class="px-4 py-2 bg-blue-400 border rounded text-white cursor-pointer hover:opacity-75">Add new post</a>
                    </div>

                    @if(session()->has('message'))
                        <div class="bg-green-100 p-4 my-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table-auto w-full border border-collapse">
                        <thead>
                            <tr>
                                <th class="border">ID</th>
                                <th class="border">Slug</th>
                                <th class="border">Title</th>
                                <th class="border">Has published</th>
                                <th class="border">Created On</th>
                                <th class="border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr class="py-5">
                                    <td class="border py-3">{{ $post->id }}</td>
                                    <td class="border py-3">{{ $post->slug }}</td>
                                    <td class="border py-3">{{ $post->title }}</td>
                                    <td class="border py-3">{{ $post->has_published }}</td>
                                    <td class="border py-3">{{ $post->created_at }}</td>
                                    <td class="border py-3">
                                        <a class="text-blue-500 hover:underline" href="/admin/posts/{{ $post->id }}/delete">Delete</a> -
                                        <a class="text-blue-500 hover:underline" href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="py-4">
                                    <td colspan="6" class="text-center py-3 border">No posts found in the database.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
