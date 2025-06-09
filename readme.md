# 📱 RISSCELL — Layanan Reparasi Handphone Jakarta Barat

[![PHP](https://img.shields.io/badge/PHP-8%2B-blue?logo=php)](https://www.php.net/releases/8.0/en.php)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blueviolet?logo=bootstrap)](https://getbootstrap.com/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)](https://www.mysql.com/)
[![XAMPP](https://img.shields.io/badge/XAMPP-Server-orange?logo=apache)](https://www.apachefriends.org/)
[![Postman](https://img.shields.io/badge/Postman-API_Testing-orange?logo=postman)](https://www.postman.com/)

Aplikasi web modern untuk layanan reparasi handphone di Jakarta Barat.  
Dibangun dengan **PHP Native**, **Bootstrap 5**, dan **MySQL**.  
Struktur MVC sederhana, responsif, dan mudah dikembangkan.

---

## 👥 Tim Pengembang

- **Dimas Bayu Nugroho** — Developer utama (coding, development, research)
- **Alexa Cindy Safara Anasrullah** — Service Concept Designer & UI/UX
- **Shafyya Putri Meyranti** — UI/UX
- **Siti Jamilah Safitri** — UI/UX

---

## ✨ Fitur Utama

- **Landing Page Modern** — Carousel, lokasi, animasi header transparan (glass).
- **Form Kontak** — Kirim pesan ke database, feedback modal Bootstrap.
- **Form Service Request** — Permintaan service, data tersimpan, feedback modal.
- **Invoice System** — Pembuatan, pencarian, pembayaran invoice (pending/paid).
- **Notifikasi Modal Interaktif** — Semua feedback sukses/gagal pakai modal Bootstrap.
- **Halaman 404 Custom** — Tampilan error yang informatif.
- **Desain UI/UX Modern & Responsif** — Bootstrap 5, custom CSS per view.
- **Lokasi Google Maps** — Tampilkan lokasi toko/service center.
- **Routing Sederhana** — Navigasi antar halaman dengan pretty URL.
- **Struktur MVC Sederhana** — Controller, model, view terpisah.
- **Konfigurasi Aman** — Koneksi database via `.env` (phpdotenv).
- **Query SQL Fleksibel** — Admin bisa cek, update, hapus data dengan query SQL.

---

## 🚀 Cara Menjalankan

1. **Copy folder proyek** ke dalam `htdocs` XAMPP.
2. **Buat database** MySQL dengan nama `risscell` dan import struktur tabel dari [`SQL/risscell.sql`](SQL/risscell.sql).
3. **Copy file `.env.example` ke `.env`** lalu sesuaikan konfigurasi database.
4. **Jalankan XAMPP** dan akses melalui browser:  
   `http://localhost/projek/`

---

## 🗄️ Struktur Database

Tabel utama:

- `contact_messages`: Menyimpan pesan dari form kontak.
- `service_requests`: Menyimpan permintaan service pelanggan.
- `invoice`: Menyimpan data invoice, terkait service request.
  - `id` (CHAR(36), PRIMARY KEY, UUID)
  - `service_request_id` (CHAR(36), FOREIGN KEY)
  - `biaya_awal` (INT)
  - `created_at` (TIMESTAMP)
  - `status` (ENUM('pending', 'paid'))
  - `paid_at` (TIMESTAMP)

> **Pastikan semua tabel sudah dibuat dan relasi foreign key benar.**

---

## ⚙️ Konfigurasi

- **`config/DB.php`**: Koneksi database MySQL, otomatis membaca variabel dari `.env`.
- **`.env`**: File environment (DB_HOST, DB_NAME, DB_USER, DB_PASS).
- **`composer.json`**: Dependency management (phpdotenv, dsb).

---

## 📦 Dependensi

- PHP >= 8.x
- MySQL/MariaDB
- XAMPP (untuk pengembangan lokal)
- [Composer](https://getcomposer.org/) (dependency management)
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) (load .env)
- [Bootstrap 5](https://getbootstrap.com/) (CDN)
- [Bootstrap Icons](https://icons.getbootstrap.com/) (CDN)

---

## 🛠️ Teknologi

- **PHP Native**: Backend logic & routing sederhana (tanpa framework besar).
- **Bootstrap 5**: Framework CSS responsif & modal interaktif.
- **Bootstrap Icons**: Icon modern.
- **MySQL**: Database utama.
- **JavaScript Custom**: Efek header kaca & modal animasi.
- **Bootstrap Modal**: Semua notifikasi & feedback user.
- **Composer & phpdotenv**: Manajemen environment variable.

---

## 🗺️ Routing & Penambahan Halaman

- **Pretty URL:**  
  Navigasi antar halaman cukup dengan path, misal:
  - `/projek` untuk halaman utama
  - `/projek/contact` untuk kontak
  - `/projek/service` untuk form service
  - `/projek/invoice` untuk invoice
- Jika path tidak sesuai, diarahkan ke halaman 404.
- Untuk menambah halaman baru:
  1. Tambahkan route baru di `core/web.php`.
  2. Buat file controller dan view di folder `controller` dan `view`.

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
│   └── image/      # Semua aset gambar (logo, ilustrasi, dsb)
│       ├── HP.png
│       └── ReparasiHP.png
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