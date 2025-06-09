# Folder `view`

Folder ini berisi semua file sumber (source) yang terkait dengan tampilan (view) aplikasi.

## Struktur

-   **`404.view.php`**: View untuk halaman 404 (halaman tidak ditemukan).
-   **`contact.view.php`**: View untuk form kontak, sudah menggunakan notifikasi modal (popup) Bootstrap.
-   **`home.view.php`**: View untuk halaman home/beranda, dengan header transparan (glass) dan animasi.
-   **`invoice.view.php`**: View untuk detail invoice, pencarian invoice, dan modal notifikasi pembayaran.
-   **`service.view.php`**: View untuk form service request, dengan modal feedback sukses.

## Penjelasan

-   Setiap file `.view.php` adalah template HTML+PHP yang menampilkan data dari controller.
-   Semua style dan animasi kini langsung menggunakan Bootstrap 5 dan custom CSS di masing-masing file view.
-   Tidak ada lagi file `components.css` terpisah.

## Cara Menggunakan

-   File-file view di-include oleh controller untuk menghasilkan output HTML ke pengguna.
-   Notifikasi sukses/gagal pada form menggunakan modal Bootstrap, bukan alert biasa.

## Catatan

-   Pastikan semua file view memiliki struktur HTML yang valid dan konsisten.
-   Gunakan class CSS Bootstrap dan custom CSS di masing-masing file view.
-   Hindari logika PHP kompleks di file view; letakkan di controller atau model.
-   Untuk menambah tampilan baru, buat file `.view.php` di folder ini dan tambahkan CSS jika perlu.