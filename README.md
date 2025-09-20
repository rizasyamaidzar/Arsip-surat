# Project Surat Dinas
## Requirement
- php v-8.3
- check php -v
- node v-18
- check node -v
## Set up project
- composer install / composer update
- npm install
- create file .env lalu copy file .env.example ke dalam .env 
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan serve
- npm run dev

# 📑 Aplikasi Arsip Surat Kelurahan Karangduren

## 🎯 Tujuan
Aplikasi ini dibuat untuk membantu perangkat desa Karangduren dalam mengarsipkan surat-surat resmi.  
Setiap surat yang sudah diterbitkan dan dipindai (scan PDF) dapat diunggah, disimpan, ditelusuri, dilihat kembali, serta diunduh sesuai kebutuhan.

## ⚙️ Fitur Utama
- ✅ **Manajemen Arsip Surat**
  - Tambah surat baru (unggah file PDF, pilih kategori, isi judul).
  - Cari surat berdasarkan judul.
  - Hapus surat dengan konfirmasi terlebih dahulu.
  - Lihat detail surat (preview PDF).
  - Unduh file surat.

- ✅ **Manajemen Kategori Surat**
  - Tambah kategori baru.
  - Edit kategori yang sudah ada.
  - Hapus kategori (dengan konfirmasi).

- ✅ **Halaman About**
  - Menampilkan identitas pembuat aplikasi (foto, nama, NIM, tanggal pembuatan).

## 🗂️ Struktur Database
Database menggunakan **MySQL** dengan tabel utama:
- `arsip_surat` → menyimpan data surat (id, judul, kategori_id, file, tanggal).
- `kategori_surat` → menyimpan data kategori surat.
- (Opsional) tabel lain sesuai kebutuhan.

File `.sql` sudah tersedia di folder `/database/`.

## 🚀 Cara Setup & Menjalankan Aplikasi

### 1. Clone Repository
```bash
git clone https://github.com/username/arsip-surat.git
cd arsip-surat
