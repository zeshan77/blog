<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('message'))
                        <div class="bg-green-100 p-4 my-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table-auto w-full border border-collapse">
                        <thead>
                        <tr>
                            <th class="border">ID</th>
                            <th class="border">Post</th>
                            <th class="border">User</th>
                            <th class="border">Comment</th>
                            <th class="border">Has approved</th>
                            <th class="border">Created On</th>
                            <th class="border">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($comments as $comment)
                            <tr class="py-5">
                                <td class="border py-3">{{ $comment->id }}</td>
                                <td class="border py-3">{{ $comment->post->title }}</td>
                                <td class="border py-3">{{ $comment->user->name }}</td>
                                <td class="border py-3">{{ $comment->body }}</td>
                                <td class="border py-3">{{ $comment->has_approved ? 'Yes' : 'No' }}</td>
                                <td class="border py-3">{{ $comment->created_at->diffForHumans() }}</td>
                                <td class="border py-3">
                                    <a class="text-blue-500 hover:underline" href="/admin/comments/{{ $comment->id }}/delete">Delete</a> -
                                    <a class="text-blue-500 hover:underline" href="/admin/comments/{{ $comment->id }}/approve">Approve</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="py-4">
                                <td colspan="6" class="text-center py-3 border">No comments found in the database.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
