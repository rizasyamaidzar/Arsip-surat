<x-navbar>
    <x-layout class="mb-6">
        <x-slot:title>{{ $title ?? 'Default' }} </x-slot:title>
    </x-layout>

    <form action="{{ route('store-arsip') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" relative flex flex-col space-y-4 m-6">
            <div class="mb-6">
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Nomor Surat
                </label>
                <input type="text" id="number" name="number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                    placeholder="Nomor surat" required />
            </div>
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Title" required />
            </div>
            <div class="mb-6">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori
                </label>
                <select id="category_id" name="category_id"
                    class="mb-2 text-dark bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 ">File
                </label>
                <input type="file" id="file" name="file"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="file" required />
            </div>
            <button type="submit" class="bg-blue-600 p-2 rounded-md text-gray-900">submit</button>
    </form>
    </div>


</x-navbar>
