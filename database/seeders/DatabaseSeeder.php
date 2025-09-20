<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use App\Models\Arsip;
use App\Models\Category;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Surat;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin123',
            'password' => Hash::make('admin123'),
            'role' => true,
        ]);
        Category::factory()->create([
            'name' => 'Undangan',
            'description' => 'Kategori untuk Undangan',
        ]);
        Category::factory()->create([
            'name' => 'Pengumuman',
            'description' => 'Kategori untuk Pengumuman',
        ]);
        Category::factory()->create([
            'name' => 'Nota Dinas',
            'description' => 'Kategori untuk Nota Dinas',
        ]);
        Category::factory()->create([
            'name' => 'Pemberitahuan',
            'description' => 'Kategori untuk Pemberitahuan',
        ]);
    }
}
