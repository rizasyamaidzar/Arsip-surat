<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title ?? 'Edit Arsip' }} </x-slot:title>
    </x-layout>

    @if (session('success'))
        @include('alerts.success')
    @endif

    <form action="{{ route('update-arsip') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $arsip->id }}">
        <div class="relative flex flex-col space-y-4 m-6">

            <!-- Nomor Surat -->
            <div class="mb-6">
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Nomor Surat</label>
                <input type="text" id="number" name="number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    value="{{ old('number', $arsip->number) }}" required />
            </div>

            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    value="{{ old('title', $arsip->title) }}" required />
            </div>

            <!-- Kategori -->
            <div class="mb-6">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <select id="category_id" name="category_id"
                    class="mb-2 text-dark bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $arsip->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- File -->
            <div class="mb-6">
                <label for="file" class="block mb-2 text-sm font-medium text-gray-900">File</label>
                <input type="hidden" name="oldFile" value="{{ $arsip->file }}">
                <input type="file" id="file" name="file"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                <p class="text-sm text-gray-500 mt-1">File saat ini:
                    <a href="{{ asset('file-surat/' . $arsip->file) }}" target="_blank" class="text-blue-600 underline">
                        {{ $arsip->file }}
                    </a>
                </p>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-blue-600 p-2 rounded-md text-white">Update</button>
        </div>
    </form>
</x-navbar>
