# FAST ONE - Landing Page & Sistem Manajemen ISP

Selamat datang di repositori proyek FAST ONE! Ini adalah aplikasi web lengkap yang dibangun menggunakan Laravel, berfungsi sebagai halaman marketing (landing page) untuk penyedia layanan internet (ISP) sekaligus sistem manajemen internal (panel admin) dan portal pelanggan.

Aplikasi ini dirancang dengan alur kerja yang jelas, memisahkan antara tampilan publik, dasbor pelanggan, dan panel admin yang kuat untuk mengelola seluruh aspek bisnis.

---

## Fitur Utama

### 1. Halaman Publik (Marketing)

-   **Halaman Beranda Dinamis**: Menampilkan semua layanan dan paket yang datanya diambil langsung dari database.
-   **Detail Paket & Layanan**: Halaman terpisah untuk setiap paket dan layanan dengan deskripsi lengkap.
-   **Desain Responsif**: Tampilan yang menyesuaikan dengan baik di perangkat desktop maupun mobile.
-   **Dark Mode**: Tombol untuk mengubah tema antara mode terang dan gelap, dengan preferensi yang tersimpan di browser.

### 2. Sistem Autentikasi & Peran Pengguna

-   **Login & Register**: Sistem pendaftaran dan login yang aman menggunakan Laravel Breeze.
-   **Pemisahan Peran**: Sistem membedakan antara **Admin** dan **Pelanggan** biasa, dengan hak akses yang berbeda.
-   **Proteksi Rute**: Halaman admin dan pelanggan dilindungi oleh middleware, memastikan hanya pengguna yang sudah login yang dapat mengaksesnya.

### 3. Portal Pelanggan

-   **Dashboard Pelanggan**: Setelah login, pelanggan akan diarahkan ke halaman "Akun Saya".
-   **Pendaftaran Mandiri**: Pelanggan dapat memilih paket atau layanan dari halaman publik dan mengajukan permintaan berlangganan/layanan melalui form.
-   **Melihat Status Langganan**: Pelanggan dapat melihat detail paket yang mereka gunakan dan status langganan mereka (misalnya, "Aktif" atau "Menunggu Pemasangan").

### 4. Panel Admin

-   **Dashboard Admin**: Halaman utama untuk admin yang memberikan gambaran umum dan navigasi ke semua fitur manajemen.
-   **CRUD Paket**: Admin dapat **Membuat (Create)**, **Membaca (Read)**, **Memperbarui (Update)**, dan **Menghapus (Delete)** data paket internet.
-   **CRUD Pelanggan**: Admin dapat mengelola data semua pelanggan, termasuk mengubah paket langganan dan memperbarui status mereka (misalnya, dari "Menunggu Pemasangan" menjadi "Aktif").
-   **Manajemen Konten Layanan**: Admin dapat mengedit konten halaman-halaman informatif seperti "Upgrade & Downgrade" dan "Konsultasi Jaringan".
-   **Manajemen Permintaan**: Admin dapat melihat dan memproses semua permintaan layanan yang masuk dari pelanggan, serta mengubah statusnya (misalnya, dari "Baru" menjadi "Sudah Dihubungi" atau "Selesai").

---

## Teknologi yang Digunakan

-   **Backend**: Laravel Framework 12.19.3
-   **Frontend**: Blade, Bootstrap 5, JavaScript
-   **Autentikasi**: Laravel Breeze
-   **Database**: MySQL

---

## Instruksi Instalasi & Setup

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal Anda.

### Prasyarat

-   PHP 8.3.6
-   Composer
-   Node.js & NPM
-   Server lokal (XAMPP, Laragon, MAMP, dll.)
-   Database MySQL

### Langkah-langkah Instalasi

1.  **Clone Repository**
    Buka terminal Anda dan jalankan perintah berikut:

    ```bash
    git clone https://github.com/Miftahul2160/Pemrograman-Web.git
    cd Pemrograman-Web/UAS_FastOne/
    ```

2.  **Instal Dependensi PHP**

    ```bash
    composer install
    ```

3.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`.

    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**

    -   Buka file `.env` yang baru saja Anda buat.
    -   Buat sebuah database baru di server lokal Anda (misalnya, melalui phpMyAdmin) dengan nama `uas_fastone`.
    -   Sesuaikan variabel database di file `.env`:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=uas_fastone
        DB_USERNAME=root
        DB_PASSWORD=
        ```

6.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat semua tabel yang dibutuhkan di database Anda dan mengisinya dengan data awal (paket, layanan, dll.).

    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Instal Dependensi JavaScript**

    ```bash
    npm install
    ```

8.  **Kompilasi Aset Frontend**

    ```bash
    npm run dev
    ```

9.  **Jalankan Server Pengembangan**
    ```bash
    php artisan serve
    ```

Sekarang, aplikasi Anda sudah berjalan di `http://127.0.0.1:8000`.

---

## Panduan Penggunaan Aplikasi

### 1. Membuat Akun Admin

Secara default, semua pengguna yang mendaftar akan memiliki peran 'pelanggan'. Untuk membuat akun admin pertama Anda:

1.  Daftar akun baru melalui halaman `/register`.
2.  Buka database Anda melalui phpMyAdmin.
3.  Masuk ke tabel `users`.
4.  Cari baris data akun yang baru saja Anda buat.
5.  Ubah nilai di kolom `role` dari `pelanggan` menjadi `admin`.
6.  Sekarang, saat Anda login dengan akun tersebut, Anda akan diarahkan ke panel admin.

### 2. Alur Kerja Pelanggan

1.  Buka halaman `/register` untuk membuat akun baru.
2.  Setelah login, Anda akan diarahkan ke halaman "Akun Saya". Di sini, akan ada pemberitahuan bahwa Anda belum berlangganan.
3.  Klik tombol "Lihat Pilihan Paket" atau navigasi ke halaman beranda (`/beranda`).
4.  Pilih salah satu paket atau layanan, lalu klik "Lihat Detail".
5.  Di halaman detail, klik tombol **"Berlangganan Paket Ini"** atau isi form **"Ajukan Permintaan Layanan"**.
6.  Lengkapi form yang muncul dan kirim.
7.  Anda akan diarahkan kembali ke halaman "Akun Saya" dengan notifikasi bahwa permintaan Anda telah diterima dan status langganan/permintaan Anda adalah "Menunggu Pemasangan" atau "Baru".

### 3. Alur Kerja Admin

1.  Login dengan akun admin Anda. Anda akan diarahkan ke `/dashboard`.
2.  Gunakan menu navigasi di atas untuk mengakses berbagai panel:
    -   **Kelola Paket**: Tambah, lihat, edit, atau hapus paket internet.
    -   **Kelola Pelanggan**: Lihat daftar pelanggan. Klik "Edit" untuk mengubah detail langganan mereka, terutama untuk mengubah **Status** dari "Menunggu Pemasangan" menjadi "Aktif".
    -   **Kelola Layanan**: Edit konten teks dan judul dari halaman-halaman informatif.
    -   **Kelola Permintaan**: Lihat semua permintaan layanan yang masuk dari pelanggan. Klik "Proses" untuk melihat detailnya dan mengubah statusnya.
