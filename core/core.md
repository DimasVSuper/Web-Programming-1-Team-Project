# ⚙️ Folder `core`

Folder ini berisi file-file inti (**core**) yang menjadi fondasi utama arsitektur aplikasi dan mendukung seluruh jalannya proyek.

---

## 📁 Struktur

- **`Router.php`**  
  Class `Router` untuk menangani routing (pengaturan rute) aplikasi, menghubungkan URL ke controller yang sesuai.  
  Sudah mendukung base path dinamis, sehingga aplikasi dapat berjalan baik di lokal maupun saat deploy di subfolder.
- **`DB.php`**  
  Class `DB` untuk koneksi ke database MySQL menggunakan PDO, dengan konfigurasi database yang diatur di file `config/DB.php`.
- **`web.php`**  
  File untuk mendefinisikan semua route aplikasi (baik user maupun admin), agar routing terpusat dan mudah di-maintain.

---

## ℹ️ Penjelasan

- `Router.php` bertanggung jawab mengatur rute (URL) dan memetakan ke controller serta method yang sesuai.  
  Sudah mendukung base path dinamis, sehingga tidak perlu mengubah kode saat pindah folder/project.
- `DB.php` menyediakan koneksi ke database MySQL yang digunakan oleh model, dengan konfigurasi database yang diambil dari file `config/DB.php`.
- `web.php` adalah tempat utama untuk mendefinisikan semua route aplikasi, cukup daftarkan route langsung tanpa helper agar kompatibel dengan method static/non-static.

---

## 🚀 Cara Menggunakan

1. **Routing**  
   - Daftarkan rute di file `web.php` menggunakan instance `$router`.
   - Jalankan `$router->dispatch()` di `index.php` untuk memproses request user.
   - Tidak perlu mengubah base path secara manual, sudah otomatis.

2. **Database**  
   - Gunakan `DB.php` di file model atau controller untuk mendapatkan koneksi PDO ke database.
   - Pastikan konfigurasi database sudah benar di file `config/DB.php`.

---

## 📝 Catatan

- Folder `core` berisi file-file yang sangat penting untuk jalannya aplikasi.
- Hindari mengubah file di dalam folder ini kecuali benar-benar diperlukan.
- Konfigurasi database diatur di dalam file `config/DB.php` dan digunakan oleh `DB.php`.
- Pastikan konfigurasi database sudah benar sebelum menjalankan aplikasi.
- Untuk keamanan, jangan commit file konfigurasi database ke repository publik.
- Untuk routing, **tidak perlu menggunakan helper**—cukup daftarkan route langsung ke `$router` agar kompatibel dengan controller static/non-static.

---

## 🌐 Remote Repository

> **Repository ini dikelola secara remote di GitHub:**  
> [https://github.com/DimasVSuper/Web-Programming-1-Team-Project](https://github.com/DimasVSuper/Web-Programming-1-Team-Project)
>
> Silakan lakukan clone, pull, atau push perubahan ke repository tersebut untuk kolaborasi dan backup.

---