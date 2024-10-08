<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="w-[95%] mx-auto py-10">
        <div class="">
            <!-- <dd>{{$postData}} </dd> -->
            <!-- <style>
                td{
                    border: 1px solid red   !important;
                }
            </style> -->
            <div class="font-sans overflow-x-auto">
                <div class="flex justify-between ">

                    <h3 class="font-[700] text-3xl">
                        Blogs
                    </h3>

                    <a href="/blogs/create">
                        <button class="flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-400 transition-all text-white rounded">
                            <svg class="inline-block mr-1" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="15px" width="15px" xmlns="http://www.w3.org/2000/svg">
                                <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                            </svg> Add New
                        </button>
                    </a>
                </div>
                @if (session('success'))
                <div id="success-message" class="bg-green-100 text-green-800 p-4 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
                @endif
                <table class="min-w-full bg-white mt-10" border="1">
                    <thead class="bg-gray-100 whitespace-nowrap">
                        <tr>
                            <th class="p-4 text-xs font-semibold text-gray-800" align="center">
                                Sr No.
                            </th>
                            <th class="p-4 w-[50%] text-left text-xs font-semibold text-gray-800">
                                Name
                            </th>

                            <th class="p-4  text-xs font-semibold text-gray-800" align="center">
                                Published At
                            </th>
                            <th class="p-4  text-xs font-semibold text-gray-800" align="center">
                                Enable/Disable
                            </th>
                            <th class="p-4  text-xs font-semibold text-gray-800" align="center">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="whitespace-nowrap">
                        @foreach ($postData as $key=> $post)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-[15px] text-gray-800" align="center">
                                {{$key+1}}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{$post->title}}
                            </td>


                            <td class="p-4 text-[15px] text-gray-800" align="center">
                                {{$post->created_at}}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800" align="center">
                                <!-- <div>
                                    <label class="relative cursor-pointer block  w-fit">
                                        <input type="checkbox" class="sr-only peer" name="isEnable" id="updateEnable" data-post-id="{{ $post->id }}" {{ $post->isEnable ? 'checked' : '' }} />
                                        <div
                                            class="w-11 h-6 flex items-center bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:absolute after:left-[2px] peer-checked:after:border-white after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007bff]">
                                        </div>
                                    </label>
                                </div> -->

                                <form id="isEnableForm-{{$post->id}}" action="http://127.0.0.1:8000/blogs/{{$post->id}}/enable" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <label class="relative cursor-pointer block  w-fit">
                                        <input type="checkbox" class="sr-only peer" onchange=" document.getElementById('isEnableForm-{{$post->id}}').submit();" id="isEnable" name="isEnable" value="0" {{ $post->isEnable ? 'checked' : '' }} />
                                        <div
                                            class="w-11 h-6 flex items-center bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:absolute after:left-[2px] peer-checked:after:border-white after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007bff]">
                                        </div>
                                    </label>
                                    <button class="hidden" type="submit">Update Status</button>
                                </form>

                            </td>
                            <td class="p-4" align="center">
                                <a href="http://127.0.0.1:8000/blogs/{{$post->id}}/edit" class="mr-4 inline-block" title="Edit">
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
                                <form class="inline-block" action="{{ route('blogs.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" onclick="return confirm('Are you sure you want to delete this blog?')"> <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
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
                        <!-- <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.querySelectorAll('#updateEnable').forEach(checkbox => {
                                    checkbox.addEventListener('change', function() {
                                        const postId = this.dataset.postId;
                                        const isEnabled = this.checked;

                                        fetch(`/blogs/${postId}/update-enable`, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                },
                                                body: JSON.stringify({
                                                    isEnable: isEnabled
                                                })
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    console.log('Post enabled status updated successfully');
                                                    $.toast({
                                                        heading: 'Success',
                                                        text: `${isEnabled ? "Post Enable" : "Post Disabled"}`,
                                                        position: 'top-right',
                                                        stack: false,
                                                        icon: 'success',
                                                    })
                                                } else {
                                                    console.error('Failed to update post enabled status');
                                                    $.toast({
                                                        heading: 'Error',
                                                        text: 'Failed to update post enabled status',
                                                        position: 'top-right',
                                                        stack: false,
                                                        icon: 'error',
                                                    })
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                            });
                                    });
                                });
                            });
                        </script> -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>