# 🕹️ Folder `controller`

Folder ini berisi file-file **controller** yang menangani logika aplikasi, menerima request dari user, memproses data melalui model, dan menampilkan hasil melalui view.

---

## 📁 Struktur

-   **`homeController.php`**: 🏠 Menangani halaman home/beranda.
-   **`contactController.php`**: ✉️ Menangani form kontak dan pengiriman pesan.
-   **`serviceController.php`**: 🛠️ Mengelola form service request.
-   **`invoiceController.php`**: 🧾 Mengelola tampilan dan aksi pembayaran invoice.

---

## ℹ️ Penjelasan

-   Setiap controller bertanggung jawab untuk satu halaman atau fitur utama.
-   Controller menerima request, memproses data menggunakan model, dan meng-include view untuk output ke user.
-   Controller bertindak sebagai perantara antara **model** (data/database) dan **view** (tampilan).
-   Controller juga bertugas melakukan validasi input sebelum memproses data.

---

## 🚀 Cara Menggunakan

1.  **Router** akan memanggil method pada controller sesuai route yang diakses user.
2.  Controller memanggil method pada model untuk operasi database.
3.  Controller meng-include file view untuk menampilkan hasil ke user.
4.  Untuk menambah fitur baru, buat file controller baru dan daftarkan routenya di router.

---

## 📝 Catatan

-   Setiap file controller **hanya bertanggung jawab untuk satu halaman atau fitur**.
-   Gunakan **PHPDocs** untuk mendokumentasikan setiap class dan method.
-   Selalu **validasi input** dari user sebelum memproses data.
-   Hindari logika bisnis yang kompleks di controller, delegasikan ke model jika memungkinkan.

---

## 🌐 Remote Repository

> **Repository ini dikelola secara remote di GitHub:**  
> [https://github.com/DimasVSuper/Web-Programming-1-Team-Project](https://github.com/DimasVSuper/Web-Programming-1-Team-Project)
>
> Silakan lakukan clone, pull, atau push perubahan ke repository tersebut untuk kolaborasi dan backup.

---