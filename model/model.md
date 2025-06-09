# 🗄️ Folder `model`

Folder ini berisi semua file yang terkait dengan logika bisnis dan akses data (database) aplikasi.

## 📁 Struktur

-   **`contactProcessing.php`**: ✉️ Berisi class untuk menyimpan data pesan kontak ke database dan validasi input.
-   **`invoiceProcessing.php`**: 🧾 Berisi class `InvoiceProcessing` untuk mengelola operasi terkait invoice (simpan, ambil berdasarkan ID, cari berdasarkan nama/email, set status pembayaran).
-   **`serviceProcessing.php`**: 📱 Berisi class untuk menyimpan data service request ke database dan validasi input.

## ℹ️ Penjelasan

-   Setiap file PHP di folder ini berisi class yang bertanggung jawab untuk operasi data tertentu.
-   File-file ini digunakan oleh controller untuk berinteraksi dengan database dan memproses data.
-   Model bertugas menangani logika bisnis dan operasi CRUD (Create, Read, Update, Delete) ke database.

## 🚀 Cara Menggunakan

-   Controller memanggil method yang ada di dalam file model untuk melakukan operasi database.
-   Pastikan untuk menyertakan (require/include) file model yang dibutuhkan di dalam controller.

## 📝 Catatan

-   Sebaiknya setiap file model hanya bertanggung jawab untuk satu jenis data (misal: contact, invoice, service).
-   Gunakan PHPDocs untuk mendokumentasikan setiap class dan method.
-   Pastikan semua operasi database memiliki penanganan error yang baik.