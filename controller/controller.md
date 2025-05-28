# 🕹️ Folder `controller`

Folder ini berisi file-file controller yang menangani logika aplikasi dan berinteraksi dengan model dan view.

## 📁 Struktur

-   **`homeController.php`**: 🏠 Controller untuk menangani halaman home.
-   **`contactController.php`**: ✉️ Controller untuk menangani form kontak dan pengiriman pesan.
-   **`serviceController.php`**: 🛠️ Controller untuk mengelola form service request.
-   **`invoiceController.php`**: 🧾 Controller untuk mengelola tampilan dan aksi pembayaran invoice.

## ℹ️ Penjelasan

-   Setiap file controller bertanggung jawab untuk menerima request dari user, memproses data menggunakan model, dan menampilkan hasil menggunakan view.
-   Controller bertindak sebagai perantara antara model dan view.

## 🚀 Cara Menggunakan

-   Router memanggil method yang ada di dalam file-file controller untuk menangani request dari user.
-   Controller memanggil method yang ada di dalam file-file model untuk berinteraksi dengan database.
-   Controller meng-include file view untuk menampilkan hasil ke user.

## 📝 Catatan

-   Sebaiknya setiap file controller hanya bertanggung jawab untuk satu halaman atau fitur.
-   Gunakan PHPDocs untuk mendokumentasikan setiap class dan method.
-   Pastikan untuk memvalidasi input dari user sebelum memproses data.