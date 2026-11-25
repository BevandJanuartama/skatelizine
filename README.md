# SKATELIZINE (Skatel Izin System)

**Skatelizine (Skatel Izin System)** adalah aplikasi web perizinan dan dispensasi siswa berbasis Laravel. Aplikasi ini digunakan oleh siswa untuk mengajukan izin keluar lingkungan sekolah saat jam pelajaran berlangsung maupun mengajukan dispensasi ketika mengikuti kegiatan tertentu, serta memudahkan guru dalam memvalidasi, memantau statistik, dan mengekspor laporan perizinan.

## Fitur Utama

### Autentikasi & Hak Akses
- Login menggunakan **NIS/NIP** (`no_induk`) dan kata sandi.
- Pembagian peran pengguna (`siswa` dan `guru`) menggunakan middleware `CheckRole`.
- Notifikasi aksi berbasis SweetAlert (`realrashid/sweet-alert`).

### Peran Siswa
- **Halaman Utama & Beranda**: Informasi sistem perizinan dan ringkasan pengajuan siswa.
- **Pengajuan Izin**: Formulir pengajuan izin keluar sekolah dengan data siswa, alasan, serta unggah foto bukti (`jpeg`, `png`, `jpg`, maks. 2 MB).
- **Pengajuan Dispensasi**: Formulir pengajuan dispensasi kegiatan beserta unggah foto bukti (`jpeg`, `png`, `jpg`, maks. 2 MB).
- **Riwayat Pengajuan**: Melihat daftar pengajuan izin dan dispensasi milik siswa beserta status validasinya (default `Proses`).
- **Profil Siswa**: Memperbarui alamat dan kata sandi akun.

### Peran Guru
- **Data & Validasi Pengajuan**: Melihat seluruh pengajuan izin dan dispensasi siswa serta memperbarui status validasi masing-masing pengajuan.
- **Diagram Statistik**: Visualisasi grafik (Chart.js) untuk memantau jumlah izin dan dispensasi:
  - Per tingkat kelas (`X`, `XI`, `XII`)
  - Per subkelas (`A`–`G`)
  - Detail izin per siswa pada kelas/subkelas tertentu
- **Ekspor Excel**: Mengunduh laporan rekap jumlah izin dan dispensasi siswa per kelas ke file `izin_dispen_per_kelas.xlsx` (multi-sheet per kelas) menggunakan `maatwebsite/excel`.

## Tech Stack

- **Backend**: PHP `^8.2`, Laravel `^11.9`
- **Frontend**: Laravel Blade, Tailwind CSS, Alpine.js `^3.4.2`, Chart.js, Font Awesome
- **Build Tool**: Vite `^5.0` (`laravel-vite-plugin`, `axios`, `postcss`, `autoprefixer`)
- **Package Tambahan**:
  - `maatwebsite/excel` (`^3.1`) — Ekspor data izin dan dispensasi ke Excel
  - `realrashid/sweet-alert` (`^7.3`) — Notifikasi SweetAlert pada Laravel
- **Database**: SQLite (default pada `.env.example`) atau MySQL/MariaDB

## Struktur Proyek

```text
skatelizine/
├── app/
│   ├── Exports/
│   │   └── IzinDispenExport.php    # Logika ekspor Excel multi-sheet per kelas
│   ├── Http/
│   │   ├── Controllers/            # LoginController, SiswaController, GuruController, ProfileController
│   │   └── Middleware/CheckRole.php # Middleware pembatasan peran (siswa/guru)
│   └── Models/                     # User, Izin, Dispen
├── database/
│   ├── migrations/                 # Skema tabel users, izins, dispens, cache, jobs, sessions
│   └── seeders/                    # DatabaseSeeder
├── public/                         # Aset publik dan gambar
├── resources/
│   └── views/                      # Tampilan Blade (auth, siswa, guru)
├── routes/
│   └── web.php                     # Definisi rute web aplikasi
├── .env.example                    # Contoh konfigurasi environment
├── composer.json                   # Dependensi PHP & Laravel
├── manifest.json                   # Web app manifest
├── package.json                    # Dependensi frontend & skrip Vite
└── vite.config.js                  # Konfigurasi Vite
```

## Konfigurasi Environment

Salin file `.env.example` menjadi `.env`, lalu sesuaikan pengaturannya sesuai kebutuhan lingkungan lokal Anda (lihat referensi lengkap pada `.env.example`).

Secara default pada `.env.example`, aplikasi menggunakan:
- `DB_CONNECTION=sqlite` (dapat diubah ke `mysql` dengan mengisi `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`)
- `SESSION_DRIVER=database`, `QUEUE_CONNECTION=database`, dan `CACHE_STORE=database`
- `FILESYSTEM_DISK=local`

## Instalasi & Menjalankan Aplikasi

1. **Clone repositori dan masuk ke direktori proyek:**
   ```bash
   git clone https://github.com/BevandJanuartama/skatelizine.git
   cd skatelizine
   ```

2. **Instal dependensi PHP dan JavaScript:**
   ```bash
   composer install
   npm install
   ```

3. **Siapkan file environment dan application key:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *(Di Windows PowerShell, gunakan `Copy-Item .env.example .env`)*

4. **Siapkan database dan jalankan migrasi:**
   - Jika menggunakan SQLite (default `.env.example`), pastikan file `database/database.sqlite` tersedia.
   - Jika menggunakan MySQL, buat database terlebih dahulu lalu atur kredensialnya di `.env`.
   - Jalankan migrasi:
     ```bash
     php artisan migrate
     ```

5. **Buat symbolic link untuk penyimpanan foto bukti (`public` disk):**
   ```bash
   php artisan storage:link
   ```

6. **Build aset frontend dan jalankan server pengembangan:**
   ```bash
   npm run build
   php artisan serve
   ```
   Untuk mode pengembangan dengan hot-reload aset Vite, jalankan di terminal terpisah:
   ```bash
   npm run dev
   ```

   Aplikasi dapat diakses melalui `http://localhost:8000`.
