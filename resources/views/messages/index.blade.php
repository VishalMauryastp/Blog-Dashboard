<x-app-layout>
    <div class="w-[95%] mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-red-600 mb-4">Message Inbox</h1>

        @if (session('success'))
        <div id="success-message" class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-3 text-left text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-gray-700">Phone</th>
                    <th class="px-6 py-3 text-left text-gray-700">Subject</th>
                    <!-- <th class="px-6 py-3 text-left text-gray-700">Message</th> -->
                    <th class="px-6 py-3 text-left text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $message->name }}</td>
                    <td class="px-6 py-4">{{ $message->email }}</td>
                    <td class="px-6 py-4">{{ $message->phone }}</td>
                    <td class="px-6 py-4">{{ $message->subject }}</td>
                    <!-- <td class="px-6 py-4">{{ $message->message }}</td>  -->
                    <td class="px-6 py-4">{{ $message->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="px-6 py-4">

                        <a href="http://127.0.0.1:8000/blogs/edit" class="mr-4 inline-block" title="View message">
                           
                            <svg stroke="currentColor" fill="none" class="w-5 text-blue-500 hover:text-blue-700" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"></path><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"></path><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"></path></svg>
                        </a>
                        <form class="inline-block" action="{{ route('inbox.destroy', $message->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" onclick="return confirm('Are you sure you want to delete this message?')"> <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                    <path
                                        d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                        data-original="#000000" />
                                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                        data-original="#000000" />
                                </svg></button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-app-layout>