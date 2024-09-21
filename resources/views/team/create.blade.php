<x-app-layout>

    <div class="w-[95%] mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-red-600 mb-4">
            Add New Team Member
        </h1>

        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        <div class="mt-10">
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="lg:flex gap-4">
                    <!-- Name Field -->
                    <div class="mb-4 lg:w-1/2">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" id="name" name="name" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Designation Field -->
                    <div class="mb-4 lg:w-1/2">
                        <label for="designation" class="block text-gray-700">Designation</label>
                        <input type="text" id="designation" name="designation" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                        @error('designation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Social Links -->
                <div class="lg:flex gap-4">
                    <div class="mb-4 lg:w-1/2">
                        <label for="twitter" class="block text-gray-700">Twitter Link (optional)</label>
                        <input type="url" id="twitter" name="twitter" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        @error('twitter')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 lg:w-1/2">
                        <label for="linkedin" class="block text-gray-700">LinkedIn Link (optional)</label>
                        <input type="url" id="linkedin" name="linkedin" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        @error('linkedin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 lg:w-1/2">
                        <label for="facebook" class="block text-gray-700">Facebook Link (optional)</label>
                        <input type="url" id="facebook" name="facebook" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        @error('facebook')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Profile Image (optional)</label>
                    <input type="file" id="image" name="image" class="w-full mt-1 p-2 border border-gray-300 rounded" accept="image/*">
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Team Member</button>
            </form>
        </div>
    </div>
</x-app-layout>