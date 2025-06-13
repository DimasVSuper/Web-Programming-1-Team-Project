# ⚙️ Folder `core`

Folder ini berisi file-file inti (**core**) yang mendukung jalannya aplikasi dan menjadi fondasi utama arsitektur projek.

---

## 📁 Struktur

- **`Router.php`**  
  Class `Router` untuk menangani routing (pengaturan rute) aplikasi, menghubungkan URL ke controller yang sesuai.
- **`DB.php`**  
  Class `DB` untuk koneksi ke database MySQL menggunakan PDO, dengan konfigurasi database yang diatur langsung di file `config/DB.php`.

---

## ℹ️ Penjelasan

- `Router.php` bertanggung jawab mengatur rute (URL) dan memetakan ke controller serta method yang sesuai.
- `DB.php` menyediakan koneksi ke database MySQL yang digunakan oleh model, dengan konfigurasi database yang diambil dari file `config/DB.php`.

---

## 🚀 Cara Menggunakan

1. **Routing**  
   - Daftarkan rute di file `web.php` menggunakan instance `Router`.
   - Jalankan `$router->dispatch()` di `index.php` untuk memproses request user.

2. **Database**  
   - Gunakan `DB.php` di file model atau controller untuk mendapatkan koneksi PDO ke database.
   - Pastikan konfigurasi database sudah benar di file `config/DB.php`.

---

## 📝 Catatan

- Folder `core` berisi file-file yang sangat penting untuk jalannya aplikasi.
- Hindari mengubah file di dalam folder ini kecuali benar-benar diperlukan.
- Konfigurasi database diatur di dalam file `config/DB.php` dan digunakan oleh `DB.php`.
- Pastikan konfigurasi database sudah benar sebelum menjalankan aplikasi.

---

## 🌐 Remote Repository

> **Repository ini dikelola secara remote di GitHub:**  
> [https://github.com/DimasVSuper/Web-Programming-1-Team-Project](https://github.com/DimasVSuper/Web-Programming-1-Team-Project)
>
> Silakan lakukan clone, pull, atau push perubahan ke repository tersebut untuk kolaborasi dan backup.

---