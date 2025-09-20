<x-navbar>
    @section('link')
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @endsection
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    <div class="flex justify-between items-center">
        <a class="bg-blue-600 text-white px-2 py-2 rounded-lg m-lg-2" href="{{ route('create-category') }}">Tambah</a>

        {{-- Start Search --}}
        <form action="{{ url('/category') }}" method="GET" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul surat..."
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64 focus:ring focus:ring-blue-300" />

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2">
                Cari
            </button>
        </form>
        {{-- End Search --}}

    </div>
    <div class="mt-5">
        @if (session('success'))
            @include('alerts.success')
        @endif

    </div>

    @if ($categories->isEmpty())
        <div
            class="no-file-found flex flex-col items-center justify-center py-8 px-4 text-center bg-gray-100 rounded-lg shadow-md">
            <svg class="w-12 h-12 dark:text-gray-400 text-gray-700" stroke="currentColor" fill="currentColor"
                stroke-width="0" viewBox="0 0 24 24" height="200px" width="200px" xmlns="http://www.w3.org/2000/svg">
                <g id="File_Off">
                    <g>
                        <path
                            d="M4,3.308a.5.5,0,0,0-.7.71l.76.76v14.67a2.5,2.5,0,0,0,2.5,2.5H17.44a2.476,2.476,0,0,0,2.28-1.51l.28.28c.45.45,1.16-.26.7-.71Zm14.92,16.33a1.492,1.492,0,0,1-1.48,1.31H6.56a1.5,1.5,0,0,1-1.5-1.5V5.778Z">
                        </path>
                        <path
                            d="M13.38,3.088v2.92a2.5,2.5,0,0,0,2.5,2.5h3.07l-.01,6.7a.5.5,0,0,0,1,0V8.538a2.057,2.057,0,0,0-.75-1.47c-1.3-1.26-2.59-2.53-3.89-3.8a3.924,3.924,0,0,0-1.41-1.13,6.523,6.523,0,0,0-1.71-.06H6.81a.5.5,0,0,0,0,1Zm4.83,4.42H15.88a1.5,1.5,0,0,1-1.5-1.5V3.768Z">
                        </path>
                    </g>
                </g>
            </svg>
            <h3 class="text-xl font-medium mt-4 text-gray-700">Belum ada surat dinas</h3>

        </div>
    @else
        <table class="min-w-full divide-y divide-gray-200 mt-8  ">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Keterangan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->description }}</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $category->category->name }}</td> --}}

                        <td class=" flex flex-col-3 gap-3 px-6 py-4 whitespace-nowrap">
                            {{-- <a class=" bg-blue-500 p-2" href="/category/{{ $category->id }}">view</a> --}}
                            {{-- <a href="/category/{{ $category->id }}"
                                class="px-4 py-2 mx-auto my-auto font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out"><span
                                    class="material-symbols-outlined">
                                    format_list_bulleted
                                </span></a>
                            <link rel="stylesheet"
                                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=format_list_bulleted" /> --}}

                            <a href="/edit-category/{{ $category->id }}"
                                class="px-4 py-2 mx-auto my-auto font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out"><span
                                    class="material-icons ">
                                    edit
                                </span></a>
                            <button type="button" data-modal-target="confirmDelete-{{ $category->id }}"
                                data-modal-toggle="confirmDelete-{{ $category->id }}"
                                class="px-4 py-2 mx-auto my-auto font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                                <span class="material-icons">delete</span>
                            </button>

                            <!-- Modal Konfirmasi -->
                            <div id="confirmDelete-{{ $category->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
                                    <h3 class="text-lg font-medium text-gray-900">Konfirmasi Hapus</h3>
                                    <p class="mt-2 text-sm text-gray-500">Apakah Anda yakin ingin menghapus category
                                        <b>{{ $category->name }}</b>?
                                    </p>

                                    <div class="mt-4 flex justify-end gap-2">
                                        <button data-modal-hide="confirmDelete-{{ $category->id }}" type="button"
                                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">Batal</button>
                                        <form action="{{ route('destroy.category') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <button type="submit"
                                                class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-500">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif
</x-navbar>
