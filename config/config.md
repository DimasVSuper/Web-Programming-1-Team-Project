# ⚙️ Folder `config`

Folder ini berisi file-file konfigurasi yang digunakan oleh aplikasi.

## 📁 Struktur

-   **`DB.php`**: 🗄️ File yang berisi konfigurasi koneksi ke database MySQL.

## ℹ️ Penjelasan

-   `DB.php` berisi informasi tentang host, username, password, dan nama database yang digunakan oleh aplikasi.

## 🚀 Cara Menggunakan

-   File `DB.php` di-include di dalam file-file model untuk mendapatkan koneksi ke database.

## 📝 Catatan

-   Pastikan untuk mengubah konfigurasi database sesuai dengan pengaturan di server Anda.
-   Jangan menyimpan informasi sensitif (seperti password database) secara langsung di dalam file konfigurasi. Sebaiknya gunakan variabel environment.