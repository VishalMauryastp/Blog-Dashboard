<x-page    meta_title="Dummy Meta Title" 
    meta_description="This is a dummy meta description for testing purposes." 
    meta_keywords="dummy, test, laravel">
    <div class="bg-gray-100 min-h-screen py-6">
        <div class="container mx-auto bg-white rounded-lg shadow-lg p-6 max-w-2xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image_alt }}" class="rounded-lg mb-4">
            @endif

            <div class="content mb-4">
                {!! $post->content !!}
            </div>

            <div class="meta border-t border-gray-300 pt-4 mt-4">
                <p class="text-gray-600"><strong>Meta Title:</strong> {{ $post->meta_title }}</p>
                <p class="text-gray-600"><strong>Meta Description:</strong> {{ $post->meta_description }}</p>
                <p class="text-gray-600"><strong>Meta Keywords:</strong> {{ $post->meta_keyword }}</p>
            </div>

            <a href="{{ route('blogs.index') }}"
                class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition">
                Back to All Blogs
            </a>
        </div>
    </div>
</x-page>