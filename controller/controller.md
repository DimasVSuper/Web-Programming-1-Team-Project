# 🕹️ Folder `controller`

Folder ini berisi file-file controller yang menangani logika aplikasi, menerima request dari user, memproses data melalui model, dan menampilkan hasil melalui view.

## 📁 Struktur

-   **`homeController.php`**: 🏠 Menangani halaman home/beranda.
-   **`contactController.php`**: ✉️ Menangani form kontak dan pengiriman pesan.
-   **`serviceController.php`**: 🛠️ Mengelola form service request.
-   **`invoiceController.php`**: 🧾 Mengelola tampilan dan aksi pembayaran invoice.

## ℹ️ Penjelasan

-   Setiap controller bertanggung jawab untuk satu halaman atau fitur utama.
-   Controller menerima request, memproses data menggunakan model, dan meng-include view untuk output ke user.
-   Controller bertindak sebagai perantara antara model (data/database) dan view (tampilan).

## 🚀 Cara Menggunakan

-   Router akan memanggil method pada controller sesuai route yang diakses user.
-   Controller memanggil method pada model untuk operasi database.
-   Controller meng-include file view untuk menampilkan hasil ke user.

## 📝 Catatan

-   Sebaiknya setiap file controller hanya bertanggung jawab untuk satu halaman atau fitur.
-   Gunakan PHPDocs untuk mendokumentasikan setiap class dan method.
-   Selalu validasi input dari user sebelum memproses data.