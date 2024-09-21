<x-app-layout>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <div class="w-[95%] mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-red-600 mb-4">
            Create Post
        </h1>
        
        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        <div class="">
            <form class="" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="lg:flex gap-4 ">
                    <!-- Title Field -->
                    <div class="mb-4 lg:w-1/2">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug Field -->
                    <div class="mb-4 lg:w-1/2">
                        <label for="slug" class="block text-gray-700">Slug</label>
                        <input type="text" id="slug" name="slug" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <!-- Content Field -->
                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Content</label>
                    <textarea id="content" name="content" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded" required></textarea>
                    @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="lg:flex gap-4 ">
                    <!-- Featured Image Field -->
                    <div class="mb-4 lg:w-1/2">
                        <label for="image" class="block text-gray-700">Featured Image (optional)</label>
                        <input type="file" id="image" name="image" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Alt Field -->
                    <div class="mb-4 lg:w-1/2">
                        <label for="image_alt" class="block text-gray-700">Image Alt Text (optional)</label>
                        <input type="text" id="image_alt" name="image_alt" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        @error('image_alt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Is Enable Field -->
                <!-- <div class="mb-4">
                    <label for="isEnable" class="block text-gray-700">Is Enabled</label>
                    <input type="checkbox" id="isEnable" name="isEnable" class="mt-1">
                    @error('isEnable')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> -->

                <!-- Meta Title Field -->
                <div class="mb-4">
                    <label for="meta_title" class="block text-gray-700">Meta Title (optional)</label>
                    <input type="text" id="meta_title" name="meta_title" class="w-full mt-1 p-2 border border-gray-300 rounded">
                    @error('meta_title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Keyword Field -->
                <div class="mb-4">
                    <label for="meta_keyword" class="block text-gray-700">Meta Keywords (optional)</label>
                    <input type="text" id="meta_keyword" name="meta_keyword" class="w-full mt-1 p-2 border border-gray-300 rounded">
                    @error('meta_keyword')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description Field -->
                <div class="mb-4">
                    <label for="meta_description" class="block text-gray-700">Meta Description (optional)</label>
                    <textarea id="meta_description" name="meta_description" rows="3" class="w-full mt-1 p-2 border border-gray-300 rounded"></textarea>
                    @error('meta_description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('content');
        // CKEDITOR.replace('meta_description'); // Initialize CKEditor for meta_description if needed
    </script>
</x-app-layout>