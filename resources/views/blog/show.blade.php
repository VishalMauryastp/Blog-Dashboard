<x-page>
    <!-- <dd>
        {{$post}}
    </dd> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keyword }}">

    <div>
        <div class="container">
            <h1>{{ $post->title }}</h1>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image_alt }}"
                    style="max-width: 100%; height: auto;">
            @endif

            <div class="content">
                {!! $post->content !!} 
            </div>

            <div class="meta">
                <p><strong>Meta Title:</strong> {{ $post->meta_title }}</p>
                <p><strong>Meta Description:</strong> {{ $post->meta_description }}</p>
                <p><strong>Meta Keywords:</strong> {{ $post->meta_keyword }}</p>
            </div>

            <a href="{{ route('blog.index') }}">Back to All Blogs</a>
        </div>
    </div>
</x-page>