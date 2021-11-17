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
                        <a href="/admin/posts" class="px-4 py-2 bg-blue-400 border rounded text-white cursor-pointer hover:opacity-75">show all posts</a>
                    </div>

                    @if($errors->any())
                        <ul class="bg-red-50 px-4 py-4 mt-8">
                            @foreach($errors->all() as $error)
                                <li class="text-red-800 my-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                    <form action="{{ route('posts.update', $post->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label class="block" for="title">Title</label>
                            <input class="block w-full border rounded px-2 py-2" type="text" name="title" id="title" placeholder="Enter your title here" value="{{ old('title', $post->title) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block" for="summary">Summary</label>
                            <textarea class="w-full border rounded px-2 py-2" name="summary" id="summary" cols="30" rows="5" placeholder="Enter sumary of the post">{{ old('summary', $post->summary) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block" for="content">Content</label>
                            <textarea class="w-full border rounded px-2 py-2" name="content" id="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="has_published">Should this post be published?</label>
                            <input type="checkbox" name="has_published" id="has_published" value="{{ now() }}" {{ old('has_published', $post->has_published) ? 'checked' : '' }}>
                        </div>

                        <div class="mb-4">
                            <label class="block" for="expired_at">When this post should expire?</label>
                            <input class="border rounded px-2 py-2" type="date" name="expired_at" id="expired_at" value="{{ old('expired_at', $post->expired_at) }}">
                        </div>

                        <div class="mb-5">
                            <label class="block" for="scheduled_at">When this post should be published?</label>
                            <input class="border rounded px-2 py-2" type="date" name="scheduled_at" id="scheduled_at" value="{{ old('scheduled_at', $post->scheduled_at) }}">
                        </div>

                        <button type="submit" value="Submit" class="px-4 py-2 bg-blue-400 text-white hover:opacity-75 border rounded">
                            Update
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
