<x-app-layout>

    <div class="w-[95%] mx-auto px-4 py-8">

       
        <h1 class="text-4xl font-bold text-red-600 mb-4 ">
            Create Post
        </h1>
        <div class="">
            <form class="  " action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>
                    <input type="text" id="title" name="title" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Content</label>
                    <textarea id="content" name="content" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded" required></textarea>
                    @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Featured Image (optional)</label>
                    <input type="file" id="image" name="image" class="w-full mt-1 p-2 border border-gray-300 rounded">
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
            </form>
        </div>



</x-app-layout>