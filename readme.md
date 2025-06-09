# 📱 RISSCELL — Layanan Reparasi Handphone Jakarta Barat

[![PHP](https://img.shields.io/badge/PHP-8%2B-blue?logo=php)](https://www.php.net/releases/8.0/en.php)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blueviolet?logo=bootstrap)](https://getbootstrap.com/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)](https://www.mysql.com/)
[![XAMPP](https://img.shields.io/badge/XAMPP-Server-orange?logo=apache)](https://www.apachefriends.org/)
[![Postman](https://img.shields.io/badge/Postman-API_Testing-orange?logo=postman)](https://www.postman.com/)

Aplikasi web sederhana untuk layanan reparasi handphone di Jakarta Barat.  
Dibangun dengan **PHP Native**, **Bootstrap 5**, dan **MySQL**.

---

## 👥 Anggota Kelompok

- **Dimas Bayu Nugroho** — Developer utama (coding, development, research)
- **Alexa Cindy Safara Anasrullah** — Service Concept Designer & UI/UX
- **Shafyya Putri Meyranti** — UI/UX
- **Siti Jamilah Safitri** — UI/UX

---

## ✨ Fitur Utama

- **Landing Page Modern** — Informasi layanan, carousel, lokasi, dan animasi header transparan (glass).
- **Form Kontak** — Pengunjung dapat mengirim pesan, data tersimpan ke database, feedback dengan modal Bootstrap.
- **Form Service Request** — Pelanggan mengisi permintaan service, data tersimpan, feedback modal animatif.
- **Invoice System** — Pembuatan, pencarian, dan pembayaran invoice dengan status (pending/paid).
- **Notifikasi Modal Interaktif** — Semua feedback sukses/gagal menggunakan modal Bootstrap, bukan alert biasa.
- **Halaman 404** — Tampilan custom jika halaman tidak ditemukan.
- **Desain UI/UX Modern & Responsif** — Bootstrap 5, custom CSS di setiap view, animasi smooth.
- **Lokasi Google Maps** — Menampilkan lokasi toko/service center.
- **Routing Sederhana** — Navigasi antar halaman dengan pretty URL.
- **Struktur MVC Sederhana** — Pemisahan controller, model, dan view.
- **Konfigurasi Aman** — Koneksi database via `.env` (phpdotenv).
- **Query SQL Fleksibel** — Admin dapat cek, update, dan hapus data dengan query yang mudah.

---

## 🚀 Cara Menjalankan

1. **Copy folder proyek** ke dalam `htdocs` XAMPP.
2. **Buat database** MySQL dengan nama `risscell` dan import struktur tabel dari file `risscell.sql`.
3. **Copy file `.env.example` ke `.env`** lalu sesuaikan konfigurasi database.
4. **Jalankan XAMPP** dan akses melalui browser:  
   `http://localhost/projek/`

---

## 🗄️ Struktur Database

Tabel-tabel utama:

- `contact_messages`: Menyimpan pesan dari form kontak.
- `service_requests`: Menyimpan data permintaan service dari pelanggan.
- `invoice`: Menyimpan data invoice, terkait dengan service request.
  - `id` (CHAR(36), PRIMARY KEY, UUID)
  - `service_request_id` (CHAR(36), FOREIGN KEY references `service_requests`.`id`)
  - `biaya_awal` (INT)
  - `created_at` (TIMESTAMP)
  - `status` (ENUM('pending', 'paid'))
  - `paid_at` (TIMESTAMP)

> **Pastikan semua tabel sudah dibuat dan relasi foreign key terkonfigurasi dengan benar.**

---

## ⚙️ Konfigurasi

- **`config/DB.php`**: Koneksi database MySQL, otomatis membaca variabel dari `.env`.
- **`.env`**: File untuk menyimpan variabel environment (DB_HOST, DB_NAME, DB_USER, DB_PASS).
- **`composer.json`**: Untuk dependency management (phpdotenv, dsb).

---

## 📦 Dependensi

- PHP >= 8.x
- MySQL/MariaDB
- XAMPP (untuk pengembangan lokal)
- [Composer](https://getcomposer.org/) (untuk dependency management)
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) (untuk load .env)
- [Bootstrap 5](https://getbootstrap.com/) (CDN)
- [Bootstrap Icons](https://icons.getbootstrap.com/) (CDN)

---

## 🛠️ Teknologi yang Digunakan

- **PHP Native**: Backend logic dan routing sederhana (tanpa framework besar).
- **Bootstrap 5**: Framework CSS untuk desain responsif dan modal interaktif.
- **Bootstrap Icons**: Icon modern.
- **MySQL**: Database penyimpanan data.
- **JavaScript Custom**: Efek header kaca dan modal animasi.
- **Bootstrap Modal & Animasi**: Untuk notifikasi interaktif dan feedback user.
- **Composer & phpdotenv**: Untuk manajemen environment variable.

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
  1. Tambahkan route baru menggunakan metode `get()` atau `post()` pada file `core/web.php`.
  2. Buat file controller dan view-nya di folder `controller` dan `view`.

---

## 📁 Struktur Folder

```
projek/
│
├── config/         # Konfigurasi aplikasi & koneksi database
│   └── DB.php
│
├── controller/     # Semua controller (logika aplikasi)
│   ├── homeController.php
│   ├── contactController.php
│   ├── serviceController.php
│   └── invoiceController.php
│
├── core/           # File inti (router, web.php, dsb)
│   ├── Router.php
│   └── web.php
│
├── model/          # Semua model (akses data/database)
│   ├── contactProcessing.php
│   ├── serviceProcessing.php
│   └── invoiceProcessing.php
│
├── view/           # Semua file tampilan (HTML+PHP)
│   ├── 404.view.php
│   ├── contact.view.php
│   ├── home.view.php
│   ├── invoice.view.php
│   └── service.view.php
│
├── image/          # Semua aset gambar (logo, ilustrasi, dsb)
│   └── ...
│
├── .env            # Konfigurasi environment (jangan diupload ke repo publik)
├── composer.json   # Dependency management
├── risscell.sql    # Struktur database MySQL
└── readme.md       # Dokumentasi proyek
```

---

## 📚 Best Practice & Catatan

- **Jangan upload file `.env` ke repository publik.**
- Semua notifikasi dan feedback user menggunakan modal Bootstrap, bukan alert biasa.
- Semua style custom langsung di masing-masing file view, tidak ada lagi `components.css`.
- Hindari logika PHP kompleks di file view; letakkan di controller atau model.
- Untuk menambah fitur baru, cukup tambahkan controller, model, view, dan route-nya.
- File `.gitignore` sudah disiapkan untuk menghindari file sensitif dan folder yang tidak perlu diupload ke repository.
- **Lisensi:** Bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.

---