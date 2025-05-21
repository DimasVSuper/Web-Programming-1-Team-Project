# 📱 RISSCELL — Layanan Reparasi Handphone Jakarta Barat

![PHP](https://img.shields.io/badge/PHP-7%2B-blue?logo=php) ![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blueviolet?logo=bootstrap) ![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)

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
- **Routing Sederhana** — Navigasi antar halaman dengan parameter `page`.
- **Halaman 404** — Pesan jika halaman tidak ditemukan.
- **Desain Responsif** — Bootstrap & custom CSS.
- **Lokasi Google Maps** — Menampilkan lokasi toko/service center.

---

## 🚀 Cara Menjalankan

1. **Salin** folder proyek ke dalam `htdocs` XAMPP.
2. **Buat database** MySQL dengan nama `risscell` dan tabel `contact_messages`:
   ```sql
   CREATE TABLE `contact_messages` (
     `id` char(36) NOT NULL,
     `name` varchar(255) NOT NULL,
     `email` varchar(255) NOT NULL, 
     `subject` text NOT NULL,
     `message` text NOT NULL,
     `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
     PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
   ```
3. **Cek konfigurasi database** di `database/contactDB.php`.
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

- **Routing menggunakan query string:**  
  Navigasi antar halaman dengan parameter `page` pada URL, misal:
  - `?page=home` untuk halaman utama  
  - `?page=contact` untuk halaman kontak  
- Jika parameter tidak sesuai, akan diarahkan ke halaman 404.
- Untuk menambah halaman baru:
  1. Tambahkan pada array `$routes` di `routing/route.php`.
  2. Buat file view-nya di `view/src/`.

---

## 📝 Catatan

- File `.gitignore` sudah disiapkan untuk menghindari file sensitif dan folder yang tidak perlu diupload ke repository.
- **Lisensi:** Bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.

---