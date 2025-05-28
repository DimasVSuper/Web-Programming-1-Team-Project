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
- **Form Service Request** — Pelanggan dapat mengisi form permintaan service.
- **Invoice System** — Pembuatan invoice, pencarian berdasarkan nama/email, dan pembayaran.
- **Payment Status** — Indikator status pembayaran (pending/paid).
- **Notifikasi Pembayaran** — Pesan sukses setelah pembayaran.
- **Routing Sederhana** — Navigasi antar halaman dengan pretty URL.
- **Halaman 404** — Pesan jika halaman tidak ditemukan.
- **Desain Responsif** — Bootstrap & custom CSS.
- **Lokasi Google Maps** — Menampilkan lokasi toko/service center.


---

## 🚀 Cara Menjalankan

1. **Salin** folder proyek ke dalam `htdocs` XAMPP.
2. **Buat database** MySQL dengan nama `risscell` dan import struktur tabel dari file `risscell.sql`.
3. **Cek konfigurasi database** di `config/DB.php`.
4. **Jalankan XAMPP** dan akses melalui browser:  
   `http://localhost/projek/`

---

## 🗄️ Struktur Database

Berikut adalah tabel-tabel utama dalam database:

- `contact_messages`: Menyimpan pesan dari form kontak.
- `service_requests`: Menyimpan data permintaan service dari pelanggan.
- `invoice`: Menyimpan data invoice, terkait dengan service request.
  - `id` (CHAR(36), PRIMARY KEY, UUID)
  - `service_request_id` (CHAR(36), FOREIGN KEY references `service_requests`.`id`)
  - `biaya_awal` (INT)
  - `created_at` (TIMESTAMP)
- `payments`: Menyimpan data pembayaran, terkait dengan invoice.
  - `id` (CHAR(36), PRIMARY KEY, UUID)
  - `invoice_id` (CHAR(36), FOREIGN KEY references `invoice`.`id`)
  - `status` (ENUM('pending', 'paid'))
  - `paid_at` (TIMESTAMP)

Pastikan semua tabel sudah dibuat dan relasi foreign key terkonfigurasi dengan benar.

---

## ⚙️ Konfigurasi

- **`config/DB.php`**: Konfigurasi koneksi database MySQL.
- **`.env` (Jika ada)**: File untuk menyimpan variabel environment (misal: API key).

---

## 📦 Dependensi

- PHP >= 8.x
- MySQL/MariaDB
- XAMPP (untuk pengembangan lokal)
- [Bootstrap 5](https://getbootstrap.com/) (CDN)
- [Bootstrap Icons](https://icons.getbootstrap.com/) (CDN)

---

## 🛠️ Teknologi yang Digunakan

- PHP Native: Backend logic dan routing sederhana.
- Bootstrap 5: Framework CSS untuk desain responsif.
- MySQL: Database penyimpanan data.

---

## 🗺️ Routing & Penambahan Halaman

- **Routing menggunakan pretty URL:**  
  Navigasi antar halaman cukup dengan path, misal:
  - `/projek` untuk halaman utama
  - `/projek/contact` untuk halaman kontak
  - `/projek/service` untuk form service request
  - `/projek/invoice` untuk menampilkan invoice
- Jika path tidak sesuai, akan diarahkan ke halaman 404.
- Untuk menambah halaman baru:
  1. Tambahkan route baru menggunakan metode `get()` atau `post()` pada instance `Router` di `index.php`.
  2. Buat file controller dan view-nya.

---

## 📝 Catatan

- File `.gitignore` sudah disiapkan untuk menghindari file sensitif dan folder yang tidak perlu diupload ke repository.
- **Lisensi:** Bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.

---