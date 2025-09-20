<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>

    <div class="flex flex-col md:flex-row items-start gap-6 p-6 bg-white shadow rounded-lg">

        {{-- Foto Profil --}}
        <div class="flex-shrink-0">
            <img src="{{ asset($photo) }}" alt="Foto Profil" class="w-32 h-32 rounded-full border shadow-md object-cover">
        </div>

        {{-- Info --}}
        <div>
            <h2 class="text-xl font-bold mb-4">About</h2>
            <p class="text-gray-700"><b>Nama :</b> {{ $name }}</p>
            <p class="text-gray-700"><b>NIM :</b> {{ $nim }}</p>
            <p class="text-gray-700"><b>Tanggal :</b> {{ $date }}</p>
        </div>
    </div>
</x-navbar>
