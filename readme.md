# 📱 RISSCELL — Layanan Reparasi Handphone Jakarta Barat

[![PHP](https://img.shields.io/badge/PHP-8%2B-blue?logo=php)](https://www.php.net/releases/8.0/en.php) [![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blueviolet?logo=bootstrap)](https://getbootstrap.com/) [![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)](https://www.mysql.com/) [![XAMPP](https://img.shields.io/badge/XAMPP-Server-orange?logo=apache)](https://www.apachefriends.org/)

Aplikasi web sederhana untuk layanan reparasi handphone di Jakarta Barat. Dibangun dengan **PHP Native**, **Bootstrap**, dan **MySQL**.

---

## 👥 Anggota Kelompok

- **Dimas Bayu Nugroho** — Developer utama (coding, development, research)
- **Alexa Cindy Safara Anasrullah** — Service Concept Designer & UI/UX
- **Shafyya Putri Meyranti** — UI/UX
- **Siti Jamilah Safitri** — UI/UX

---

## ✨ Fitur Utama

- **Landing Page** — Informasi layanan, carousel, dan lokasi.
- **Form Kontak** — Pengunjung dapat mengirim pesan, data tersimpan ke database.
- **Routing Sederhana** — Navigasi antar halaman dengan pretty URL.
- **Halaman 404** — Pesan jika halaman tidak ditemukan.
- **Desain Responsif** — Bootstrap & custom CSS.
- **Lokasi Google Maps** — Menampilkan lokasi toko/service center.

---

## 🚀 Cara Menjalankan

1. **Salin** folder proyek ke dalam `htdocs` XAMPP.
2. **Buat database** MySQL dengan nama `risscell` dan tabel `contact_messages`:
  ```sql
    CREATE TABLE `contact_messages` (
    `id` CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `subject` TEXT NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  ```
3. **Cek konfigurasi database** di `config/DB.php`.
4. **Jalankan XAMPP** dan akses melalui browser:  
   `http://localhost/projek/`

---

## 📦 Dependensi

- PHP >= 7.x
- MySQL/MariaDB
- XAMPP (untuk pengembangan lokal)
- [Bootstrap 5](https://getbootstrap.com/) (CDN)
- [Bootstrap Icons](https://icons.getbootstrap.com/) (CDN)

---

## 🗺️ Routing & Penambahan Halaman

- **Routing menggunakan pretty URL:**  
  Navigasi antar halaman cukup dengan path, misal:
  - `/projek` untuk halaman utama  
  - `/projek/contact` untuk halaman kontak  
- Jika path tidak sesuai, akan diarahkan ke halaman 404.
- Untuk menambah halaman baru:
  1. Tambahkan pada function `getRoutes()` di `controller/route.php`.
  2. Buat file view-nya di `view/src/`.

---

## 📝 Catatan

- File `.gitignore` sudah disiapkan untuk menghindari file sensitif dan folder yang tidak perlu diupload ke repository.
- **Lisensi:** Bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.

---
