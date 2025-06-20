# 🕹️ Folder `controller`

Folder ini berisi file-file **controller** yang menangani logika aplikasi, menerima request dari user, memproses data melalui model, dan menampilkan hasil melalui view.

---

## 📁 Struktur

-   **`homeController.php`**: 🏠 Menangani halaman home/beranda.
-   **`contactController.php`**: ✉️ Menangani form kontak dan pengiriman pesan, sudah dilengkapi validasi CSRF.
-   **`serviceController.php`**: 🛠️ Mengelola form service request, sudah dilengkapi validasi CSRF.
-   **`invoiceController.php`**: 🧾 Mengelola tampilan dan aksi pembayaran invoice, sudah dilengkapi validasi CSRF pada pembayaran.

---

## ℹ️ Penjelasan

-   Setiap controller bertanggung jawab untuk satu halaman atau fitur utama.
-   Controller menerima request, memproses data menggunakan model, dan meng-include view untuk output ke user.
-   Controller bertindak sebagai perantara antara **model** (data/database) dan **view** (tampilan).
-   Controller juga bertugas melakukan validasi input dan validasi CSRF sebelum memproses data.
-   Semua response AJAX akan mengembalikan JSON, sedangkan non-AJAX akan redirect dengan session notifikasi.

---

## 🚀 Cara Kerja

1.  **Router** akan memanggil method pada controller sesuai route yang diakses user.
2.  Controller memanggil method pada model untuk operasi database.
3.  Controller meng-include file view untuk menampilkan hasil ke user.
4.  Untuk menambah fitur baru, buat file controller baru dan daftarkan routenya di router (`core/web.php`).

---

## 📝 Catatan

-   Setiap file controller **hanya bertanggung jawab untuk satu halaman atau fitur**.
-   Gunakan **PHPDocs** untuk mendokumentasikan setiap class dan method.
-   Selalu **validasi input** dari user sebelum memproses data.
-   Selalu **validasi CSRF token** pada setiap aksi POST.
-   Hindari logika bisnis yang kompleks di controller, delegasikan ke model jika memungkinkan.
-   Untuk keamanan, setelah submit POST yang sukses, lakukan reload halaman agar CSRF token baru di-generate.

---

## 🌐 Remote Repository

> **Repository ini dikelola secara remote di GitHub:**  
> [https://github.com/DimasVSuper/Web-Programming-1-Team-Project](https://github.com/DimasVSuper/Web-Programming-1-Team-Project)
>
> Silakan lakukan clone, pull, atau push perubahan ke repository tersebut untuk kolaborasi dan backup.

---