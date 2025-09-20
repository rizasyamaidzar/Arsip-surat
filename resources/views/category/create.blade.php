<x-navbar>
    <x-layout class="mb-6">
        <x-slot:title>{{ $title ?? 'Tambah Kategori' }} </x-slot:title>
    </x-layout>

    <form action="{{ route('store-category') }}" method="POST">
        @csrf
        <div class="relative flex flex-col space-y-4 m-6">

            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Nama Kategori
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan nama kategori" required />
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                    Deskripsi
                </label>
                <textarea id="description" name="description" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tuliskan deskripsi kategori"></textarea>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300">
                Simpan
            </button>
        </div>
    </form>
</x-navbar>
