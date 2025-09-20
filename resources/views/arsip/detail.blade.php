<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>

    {{-- Detail Surat --}}
    <div class="bg-white overflow-hidden shadow rounded-lg border">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Judul Surat : {{ $arsip->title }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Nomor Surat : {{ $arsip->number }}
            </p>
        </div>
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Category : {{ $arsip->category->name }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Nomor Surat : {{ $arsip->number }}
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Tanggal
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $arsip->created_at->format('d M Y') }}
                    </dd>
                </div>
            </dl>
        </div>

        <div class="px-10 pb-6">
            <h1 class="my-2 mb-4 text-lg font-semibold">View This Dokumen</h1>
            <iframe src="{{ asset('file-surat/' . $arsip->file) }}"
                class="w-full h-[600px] border rounded-md shadow"></iframe>

            <div class="flex justify-end gap-3 mt-4">
                <!-- Button Open Modal -->
                <!-- Download -->
                <a href="/" class=" text-center bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                    Kembali
                </a>
                <a href="{{ asset('file-surat/' . $arsip->file) }}" download
                    class=" text-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                    Unduh File
                </a>
                <button onclick="document.getElementById('modalAction').classList.remove('hidden')"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow">
                    Edit File
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalAction" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-lg font-semibold mb-4">Edit File</h2>

            <!-- Form Update File -->
            <form action="{{ route('arsip.updateFile', $arsip->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload File Baru</label>
                    <input type="file" name="file" accept="application/pdf"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    @error('file')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="document.getElementById('modalAction').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                        Tutup
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-navbar>
