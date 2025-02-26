# Template starter

Template starter aplikasi ini ditujukan sebagai template code dasar sebelum membuat aplikasi agar cepat. Template starter ini mengharuskan memiliki paket sebagai berikut ini:

-   [Laravel 11 : membutuhkan minimal PHP 8.2](https://laravel.com/docs/11.x)
-   [Livewire 3 : sebagai frontent laravel 11](https://livewire.laravel.com/)
-   [PNPM : sebagai nodejs package manager](https://pnpm.io/id/)
-   [Tailwindcss : sebagai css entity](https://tailwindcss.com/docs/guides/laravel)
-   [Daisyui : thema bawaan menggunakan tailwindcss](https://daisyui.com/components/)
-   [Adminer : database management system](https://github.com/onecentlin/laravel-adminer)

Silakan jalankan perintah untuk menginstall menggunakan composer maupun pnpm. silakan ubah dokumentasi ini di file README.md dan sesuaikan dengan aplikasi yang sedang dibangun.

## Fitur bawaan

Berikut ini adalah beberapa fitur bawaan yang disediakan oleh template starter ini:

-   Frontend menggunakan livewire
-   Authentication login dan register
-   User management
-   Halaman profile user yang masuk
-   Role dan Permission menggunakan spatie laravel permission
-   Livewire sweetalert
-   Database management system menggunakan adminer laravel
-   Halaman responsive sudah disesuaikan dengan resolusi perangkat
-   CRUD Generator

## Setelah copy repository

```
cp .env.example .env
composer install
pnpm install
php artisan key:generate
php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link

```
## CRUD Generator

fitur ini di buat dengan tujuan mempersingkat waktu pengerjaan dan pembuatan file di laravel dan livewire. dengan menjalankan perintah sederhana untuk membuat beberapa file yang dibutuhkkan dalam membangun CRUD sebuah model. contoh penggunaan: 
```php artisan generate Produk```
penjelasan : "Produk" merupakan nama model. tuliskan dengan huruf besar diawal kata. contoh lain misalkan akan membuat model "detail produk" maka tuliskan perintah:
```php artisan generate DetailProduk```.

fitur crud generatorini akan membuat 7 file sebagai dasar untuk membuat suatu Entitas. file yang digenerate antara lain
1. file migration - database/migration/...
2. file Model - app/Models/...
3. file Factory - database/factory/...
4. file Seeder - database/seeder/...
5. file Livewire Form - app/Livewire/Form/...
6. file livewire view index dan controller index (tampilan berupa table) resources/view/Livewire/pages/.../index.blade.php
7. file livewire view actions dan controller actions (tampilan berupa modal dialog) resources/view/Livewire/pages/.../actions.blade.php

tahapan seteleh generate
1. edit file migration isi dengan nama kolom dan type yang sesuai
2. add $fillabel ke model
3. migrate table baru - php artisan migrate
4. isi file factory dan seeder
5. seed fake data ke database - php artisan db:seed "NamaModel"Seeder
6. edit file livewire form di app\Livewire\Form\NamaModel.php disesuaikan dengan migration dan modal
7. edit view index dan actions
