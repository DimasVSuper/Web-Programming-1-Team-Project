# ⚙️ Folder `core`

Folder ini berisi file-file inti (core) yang mendukung jalannya aplikasi.

## Struktur

-   **`Router.php`**: Class `Router` untuk menangani routing (pengaturan rute) aplikasi.
-   **`DB.php`**: Class `DB` untuk koneksi ke database MySQL.

## Penjelasan

-   `Router.php` bertanggung jawab untuk mengatur rute (URL) dan memetakan ke controller yang sesuai.
-   `DB.php` menyediakan koneksi ke database MySQL yang digunakan oleh model.

## Cara Menggunakan

-   `Router.php` digunakan di `index.php` untuk mendaftarkan rute dan menjalankan routing.
-   `DB.php` digunakan di model untuk mendapatkan koneksi ke database.

## Catatan

-   Folder `core` berisi file-file yang sangat penting untuk jalannya aplikasi.
-   Pastikan untuk tidak mengubah file-file di dalam folder ini kecuali Anda benar-benar tahu apa yang Anda lakukan.
-   Konfigurasi database diatur di dalam file `DB.php`.