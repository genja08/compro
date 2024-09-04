## Daftar Fitur Saat Ini

-   Register
-   Login
-   Edit Profile
-   Manajemen Role
-   Manajemen Permission
-   Manajemen User

## Persyaratan Sistem

Sebelum Anda memulai instalasi, pastikan komputer Anda memenuhi persyaratan sistem berikut:

-   PHP >= 8.1
-   Composer - [Panduan Instalasi Composer](https://getcomposer.org/doc/00-intro.md)
-   Node.js & NPM - [Panduan Instalasi Node.js](https://nodejs.org/)
-   Git - [Panduan Instalasi Git](https://git-scm.com/)

## Instalasi Project

Jika Sebelumnya sudah melakukan clone, anda bisa mengetikan perintah

```bash
git pull
composer install
php artisan migrate:fresh --seed
```

di direktor project sebelumnya dan lewati langkah-langkah dibawah ini.

## Langkah 1: Clone Project

Buka aplikasi git yang sudah di download dan sesuaikan direktori nya, jika anda ingin disimpan di htdocs ketikan perintah berikut :

```bash
cd C:\xampp\htdocs
```

selanjutnya clone repositori proyek ini dari GitHub:

pilih export compro.zip


```

## Langkah 2: Konfigurasi Lingkungan

Anda perlu menyalin file `.env.example` menjadi `.env` dan mengonfigurasi file `.env` sesuai dengan preferensi Anda:

```bash
cp .env.example .env
php artisan key:generate
```

## Langkah 3: Migrasi Database

php artisan migrate:refresh
php artisan migrate --seed

## Langkah 4: Menjalankan server

Untuk menjalankan server, tuliskan perintah berikut:

```bash
php artisan serve

Buat terminal baru tuliskan perintah berikut :
npm run dev

```

## Langkah 5: Instalasi NPM Dependencies

Untuk menginstal semua dependensi Node.js yang diperlukan, jalankan perintah berikut:

```bash
npm install
```

## Langkah 6: Kompilasi Asset

Untuk mengkompilasi asset, jalankan perintah berikut:

```bash
npm run dev
```

biarkan berjalan bersaamaan dengan server.

## Langkah 8 : Login ke Sistem

Setelah semuanya berjalan dengan lancar, silahkan buka google chrome dan akses

```bash
http://127.0.0.1:8000
```

Selanjutnya anda bisa melakukan login dengan :

-   Email : superadmin@gmail.com
-   Password : password

## Selamat! Anda telah berhasil menginstal proyek tersebut.

