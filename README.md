# ShareBite Backend API
Backend API untuk aplikasi ShareBite, sebuah platform berbagi makanan yang menghubungkan donor makanan dengan penerima untuk mengurangi food waste dan membantu distribusi makanan yang lebih efektif.

## Teknologi yang Digunakan
Laravel 10
PHP 8.1+
MySQL
Laravel Sanctum
REST API

## Fitur Utama

### Autentikasi
Login pengguna
Token Authentication menggunakan Laravel Sanctum

### Donasi Makanan
Melihat daftar donasi makanan
Melihat detail donasi makanan
Kategori makanan
Status ketersediaan makanan
Informasi donor dan lokasi pengambilan

### Dashboard
Ringkasan data donasi
Statistik aplikasi

## Struktur Database
Database terdiri dari beberapa tabel utama:

users
categories
food_donations
donation_requests
reviews

File database tersedia pada:
database/sharebite.sql

## Instalasi
### 1. Clone Repository
git clone https://github.com/FzWolff/sharebite.git
cd sharebite

### 2. Install Dependency
composer install

### 3. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`
copy .env.example .env
atau
cp .env.example .env

### 4. Generate Application Key
php artisan key:generate

### 5. Buat Database
Buat database baru dengan nama:
sharebite

### 6. Import Database
Import file:
database/sharebite.sql
Menggunakan phpMyAdmin atau MySQL Client.

### 7. Konfigurasi Database
Sesuaikan file `.env`
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sharebite
DB_USERNAME=root
DB_PASSWORD=

### 8. Jalankan Server
php artisan serve
Aplikasi akan berjalan pada:
http://127.0.0.1:8000

## Endpoint API

### Login
POST /api/login

### Daftar Donasi
GET /api/donations

### Detail Donasi
GET /api/donations/{id}

## Kontributor

Backend Developer:
Fazru Dwi Alamyah

## Lisensi

Project ini dibuat untuk kebutuhan pembelajaran dan bootcamp pengembangan aplikasi web menggunakan Laravel.
