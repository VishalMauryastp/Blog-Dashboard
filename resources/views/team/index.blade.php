<x-app-layout>
    <div class="w-[95%] mx-auto px-4 py-8">
        <div class="flex justify-between">

            <h3 class="font-[700] text-3xl">
                Team Members
            </h3>

            <a href="/team/create">
                <button class="flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-400 transition-all text-white rounded">
                    <svg class="inline-block mr-1" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="15px" width="15px" xmlns="http://www.w3.org/2000/svg">
                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                    </svg> Add New
                </button>
            </a>
        </div>

        @if (session('success'))
        <div id="success-message" class="bg-green-100 text-green-800 p-4 rounded mt-4 mb-4">
            {{ session('success') }}
        </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 mt-10 ">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-3 text-left text-gray-700">Image</th>
                    <th class="px-6 py-3 text-left text-gray-700">Name</th>
                    <!-- <th class="px-6 py-3 text-left text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-gray-700">Phone</th>
                    <th class="px-6 py-3 text-left text-gray-700">Subject</th> -->
                    <!-- <th class="px-6 py-3 text-left text-gray-700">Message</th> -->
                    <th class="px-6 py-3 text-left text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team as $team_member)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4"><img class="w-10 h-10 rounded-full"
                            src="{{ asset('storage/' . $team_member->image) }}"
                            alt="{{ $team_member->image }}"
                            onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTagAUI2PiSNsfW-nF3bM8SmhNtuKw3WWOAQQ&s';">
                    </td>
                    <td class="px-6 py-4">{{ $team_member->name }}</td>
                    <!-- <td class="px-6 py-4">{{ $team_member->email }}</td>
                    <td class="px-6 py-4">{{ $team_member->phone }}</td>
                    <td class="px-6 py-4">{{ $team_member->subject }}</td> -->
                    <!-- <td class="px-6 py-4">{{ $team_member->team_member }}</td>  -->
                    <td class="px-6 py-4">{{ $team_member->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="px-6 py-4 ">


                        <a href="{{ route('team.edit', $team_member->id) }}" class="mr-4 inline-block" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                viewBox="0 0 348.882 348.882">
                                <path
                                    d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                    data-original="#000000" />
                                <path
                                    d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                    data-original="#000000" />
                            </svg>
                        </a>
                        <form class="inline-block" action="{{ route('team.destroy', $team_member->id) }}" method="POST">
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