<x-page>
    <dd>
        {{$posts}}
    </dd>
    <div class="w-[95%] mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8 py-10">
        @if ($posts->isEmpty())
            <p class="text-gray-500 text-center">No posts available.</p>
        @else
            @foreach ($posts as $post)
                <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Blog Post {{$loop->index + 1}}"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-700 mb-4">{{ $post->description }}</p>
                        <a href="/blog/{{ $post->id }}" class="text-blue-500 hover:underline">Read more</a>
                    </div>
                </article>
            @endforeach
        @endif
    </div>
</x-page>