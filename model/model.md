# 🗄️ Folder `model`

Folder ini berisi semua file yang terkait dengan logika bisnis dan akses data (database) aplikasi.

---

## 📁 Struktur

-   **`contactProcessing.php`**: ✉️  
    Berisi class untuk validasi input dan menyimpan data pesan kontak ke database.
-   **`invoiceProcessing.php`**: 🧾  
    Berisi class `InvoiceProcessing` untuk mengelola operasi terkait invoice (simpan, ambil berdasarkan ID, cari berdasarkan nama/email, set status pembayaran).
-   **`serviceProcessing.php`**: 📱  
    Berisi class untuk validasi input dan menyimpan data service request ke database.

---

## ℹ️ Penjelasan

-   Setiap file PHP di folder ini berisi class yang bertanggung jawab untuk operasi data tertentu.
-   File-file ini digunakan oleh controller untuk berinteraksi dengan database dan memproses data.
-   Model bertugas menangani logika bisnis dan operasi CRUD (Create, Read, Update, Delete) ke database.
-   Semua operasi database menggunakan prepared statement untuk keamanan dari SQL Injection.

---

## 🚀 Cara Menggunakan

-   Controller memanggil method yang ada di dalam file model untuk melakukan operasi database.
-   Pastikan untuk menyertakan (`require`/`include`) file model yang dibutuhkan di dalam controller.
-   Validasi input dilakukan di model sebelum data disimpan ke database.

---

## 📝 Catatan

-   Sebaiknya setiap file model hanya bertanggung jawab untuk satu jenis data (misal: contact, invoice, service).
-   Gunakan PHPDocs untuk mendokumentasikan setiap class dan method.
-   Pastikan semua operasi database memiliki penanganan error yang baik.
-   Jangan pernah menaruh logika tampilan (HTML) di dalam file model.

---