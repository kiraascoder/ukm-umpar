<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> </a> </p> <p align="center"> <a href="https://github.com/laravel/framework/actions"> <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"> </a> </p>
Instalasi Laravel 11
Laravel 11 adalah versi terbaru dari framework Laravel yang menghadirkan penyempurnaan performa, struktur project yang lebih minimalis, serta peningkatan pada fitur-fitur seperti route, dependency injection, dan lainnya.

Persyaratan Sistem
Sebelum menginstal Laravel 11, pastikan sistem Anda memenuhi persyaratan berikut:

PHP >= 8.2

Composer (versi terbaru)

Database: MySQL, PostgreSQL, SQLite, atau SQL Server

Ekstensi PHP: openssl, pdo, mbstring, tokenizer, xml, ctype, json, bcmath, fileinfo

Langkah-Langkah Instalasi

1. Instalasi via Laravel Installer (Disarankan)
   bash
   Copy
   Edit
   composer global require laravel/installer
   laravel new nama-proyek
   Pastikan direktori ~/.composer/vendor/bin (Linux/macOS) atau %USERPROFILE%\AppData\Roaming\Composer\vendor\bin (Windows) ada di PATH Anda.

2. Instalasi via Composer
   bash
   Copy
   Edit
   composer create-project laravel/laravel nama-proyek "^11.0"
3. Menjalankan Server Lokal
   Masuk ke direktori proyek dan jalankan:

bash
Copy
Edit
cd nama-proyek
php artisan serve
Akses aplikasi di http://localhost:8000.
