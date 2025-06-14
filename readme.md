# 📱 RISSCELL — Layanan Reparasi Handphone Jakarta Barat

[![PHP](https://img.shields.io/badge/PHP-8%2B-blue?logo=php)](https://www.php.net/releases/8.0/en.php)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blueviolet?logo=bootstrap)](https://getbootstrap.com/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)](https://www.mysql.com/)
[![XAMPP](https://img.shields.io/badge/XAMPP-Server-orange?logo=apache)](https://www.apachefriends.org/)

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

- Landing page modern & responsif (carousel, lokasi, animasi header transparan).
- Form kontak & service request dengan feedback modal Bootstrap.
- Sistem invoice: pembuatan, pencarian, pembayaran (pending/paid).
- Notifikasi interaktif (modal Bootstrap).
- Halaman 404 custom.
- Google Maps lokasi toko.
- Routing sederhana (pretty URL) dengan base path **dinamis** (otomatis menyesuaikan folder/project).
- Struktur MVC sederhana (controller, model, view terpisah).
- Query SQL fleksibel untuk admin.
- **Keamanan:** Validasi input, CSRF token pada semua form POST, prepared statement untuk semua query.

---

## 🚀 Cara Menjalankan

1. **Copy folder proyek** ke dalam `htdocs` XAMPP.
2. **Buat database** MySQL dengan nama `risscell` dan import struktur tabel dari [`risscell.sql`](risscell.sql).
3. **Jalankan XAMPP** dan akses melalui browser:  
   `http://localhost/risscell/`  
   (atau sesuaikan dengan nama folder project Anda)

---

## 🗄️ Struktur Database

- `contact_messages`: Menyimpan pesan dari form kontak.
- `service_requests`: Menyimpan permintaan service pelanggan.
- `invoice`: Menyimpan data invoice, terkait service request.

> Pastikan semua tabel sudah dibuat dan relasi foreign key benar.

---

## ⚙️ Konfigurasi

- **`config/DB.php`**: Koneksi database MySQL langsung di file ini (tanpa .env, tanpa composer).
- Semua konfigurasi database (`host`, `user`, `password`, `dbname`) bisa diubah langsung di file `DB.php`.

---

## 📦 Dependensi

- PHP >= 8.x
- MySQL/MariaDB
- XAMPP (untuk pengembangan lokal)
- Bootstrap 5 (CDN)
- Bootstrap Icons (CDN)

---

## 🛠️ Teknologi

- PHP Native: Backend logic & routing sederhana (tanpa framework).
- Bootstrap 5: Framework CSS responsif & modal interaktif.
- Bootstrap Icons: Icon modern.
- MySQL: Database utama.
- JavaScript Custom: Efek header kaca & modal animasi.

---

## 🗺️ Routing & Penambahan Halaman

- Pretty URL:  
  - `/risscell` untuk halaman utama  
  - `/risscell/contact` untuk kontak  
  - `/risscell/service` untuk form service  
  - `/risscell/invoice` untuk invoice  
- Untuk menambah halaman baru:
  1. Tambahkan route baru di `core/web.php`.
  2. Buat file controller dan view di folder `controller` dan `view`.

---

## 📁 Struktur Folder

```
risscell/
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
├── risscell.sql    # Struktur database MySQL
└── readme.md       # Dokumentasi proyek
```

---

## 📚 Best Practice & Catatan

- Jangan upload file konfigurasi sensitif ke repository publik.
- Semua notifikasi dan feedback user menggunakan modal Bootstrap.
- Semua style custom langsung di masing-masing file view, tidak ada lagi `components.css`.
- Hindari logika PHP kompleks di file view; letakkan di controller atau model.
- Untuk menambah fitur baru, cukup tambahkan controller, model, view, dan route-nya.
- **Keamanan:**  
  - Semua form POST sudah menggunakan CSRF token.  
  - Semua query database menggunakan prepared statement.  
  - Validasi input dilakukan di controller dan model.
- **Lisensi:** Bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.

---

## 🌐 Remote Repository

> **Repository ini dikelola secara remote di GitHub:**  
> [https://github.com/DimasVSuper/Web-Programming-1-Team-Project](https://github.com/DimasVSuper/Web-Programming-1-Team-Project)
>
> Silakan lakukan clone, pull, atau push perubahan ke repository tersebut untuk kolaborasi dan backup.

---