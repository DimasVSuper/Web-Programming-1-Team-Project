# 🗄️ Folder `model`

Folder ini berisi semua file yang terkait dengan logika bisnis dan akses data (database) aplikasi.

## 📁 Struktur

-   **`contactProcessing.php`**: ✉️ File yang berisi fungsi untuk menyimpan data pesan kontak ke database dan validasi input.
-   **`invoiceProcessing.php`**: 🧾 File yang berisi class `InvoiceProcessing` untuk mengelola operasi terkait invoice (simpan, ambil berdasarkan ID, cari berdasarkan nama/email).
-   **`paymentProcessing.php`**: 💰 File yang berisi class `PaymentProcessing` untuk mengelola operasi terkait pembayaran (ambil data pembayaran, set status pembayaran, buat record pembayaran).
-   **`serviceProcessing.php`**: 📱 File yang berisi fungsi untuk menyimpan data service request ke database.

## ℹ️ Penjelasan

-   Setiap file PHP berisi fungsi atau class yang bertanggung jawab untuk melakukan operasi tertentu terkait data.
-   File-file ini digunakan oleh controller untuk berinteraksi dengan database dan memproses data.

## 🚀 Cara Menggunakan

-   Controller memanggil fungsi atau method yang ada di dalam file-file model untuk melakukan operasi database.
-   Pastikan untuk menyertakan (require/include) file model yang dibutuhkan di dalam controller.

## 📝 Catatan

-   Sebaiknya setiap file model hanya bertanggung jawab untuk satu jenis data (misal: contact, invoice, payment, service).
-   Gunakan PHPDocs untuk mendokumentasikan setiap fungsi dan class.
-   Pastikan semua operasi database memiliki penanganan error yang baik.