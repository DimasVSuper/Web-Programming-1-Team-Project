# ⚙️ Folder `core`

Folder ini berisi file-file inti (core) yang mendukung jalannya aplikasi.

## 📁 Struktur

-   **`Router.php`**: Class `Router` untuk menangani routing (pengaturan rute) aplikasi.
-   **`DB.php`**: Class `DB` untuk koneksi ke database MySQL.

## ℹ️ Penjelasan

-   `Router.php` bertanggung jawab mengatur rute (URL) dan memetakan ke controller yang sesuai.
-   `DB.php` menyediakan koneksi ke database MySQL yang digunakan oleh model.

## 🚀 Cara Menggunakan

-   `Router.php` digunakan di `index.php` untuk mendaftarkan rute dan menjalankan routing.
-   `DB.php` digunakan di file model untuk mendapatkan koneksi ke database.

## 📝 Catatan

-   Folder `core` berisi file-file yang sangat penting untuk jalannya aplikasi.
-   Hindari mengubah file di dalam folder ini kecuali benar-benar diperlukan.
-   Konfigurasi database diatur di dalam file `DB.php`.