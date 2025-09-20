<x-navbar>
    <x-layout class="mb-6">
        <x-slot:title>{{ $title ?? 'Edit Kategori' }} </x-slot:title>
    </x-layout>

    <form action="{{ route('update-category') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">

        <div class="relative flex flex-col space-y-4 m-6">

            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Nama Kategori
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
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
                    placeholder="Tuliskan deskripsi kategori">{{ old('description', $category->description) }}</textarea>
            </div>

            <button type="submit"
                class="bg-green-600 text-white p-2 rounded-md hover:bg-green-700 focus:ring focus:ring-green-300">
                Update
            </button>
        </div>
    </form>
</x-navbar>
