# ⚙️ Folder `config`

Folder ini berisi file-file konfigurasi utama aplikasi.

## 📁 Struktur

-   **`DB.php`**: 🗄️ Kelas untuk koneksi database MySQL menggunakan PDO, dengan konfigurasi database yang diatur langsung di file ini.

## ℹ️ Penjelasan

-   `DB.php` berisi konfigurasi host, username, password, dan nama database secara langsung (tidak lagi menggunakan file `.env`).
-   Koneksi database dibuat dengan PDO agar lebih aman dan fleksibel.

## 🚀 Cara Menggunakan

-   File `DB.php` di-include pada file model atau controller untuk mendapatkan koneksi database.
-   Pastikan konfigurasi database sudah benar di dalam file `DB.php`.

## 📝 Catatan

-   Informasi sensitif (seperti password database) memang disimpan langsung di file ini, jadi pastikan file `config/DB.php` tidak dibagikan ke publik.
-   Jika ada perubahan konfigurasi, restart server agar perubahan diterapkan.
-   Untuk keamanan, batasi akses file ini hanya untuk server aplikasi.

---