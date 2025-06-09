# ⚙️ Folder `config`

Folder ini berisi file-file konfigurasi utama aplikasi.

## 📁 Struktur

-   **`DB.php`**: 🗄️ Kelas untuk koneksi database MySQL menggunakan PDO dan environment variable.

## ℹ️ Penjelasan

-   `DB.php` menggunakan variabel environment (`.env`) untuk host, username, password, dan nama database.
-   Koneksi database dibuat dengan PDO agar lebih aman dan fleksibel.

## 🚀 Cara Menggunakan

-   File `DB.php` di-include pada file model atau controller untuk mendapatkan koneksi database.
-   Pastikan file `.env` sudah terisi dengan konfigurasi database yang benar.

## 📝 Catatan

-   Jangan menyimpan informasi sensitif (seperti password database) langsung di file PHP. Gunakan file `.env`.
-   Jangan commit file `.env` ke repository publik.
-   Jika ada perubahan konfigurasi, restart server agar environment variable ter-load ulang.