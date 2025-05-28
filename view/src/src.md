# Folder `src` pada `view`

Folder ini berisi semua file sumber (source) yang terkait dengan tampilan (view) aplikasi.

## Struktur

-   **`components.css`**: File CSS yang berisi style untuk komponen-komponen tampilan.
-   **`404.view.php`**: File view untuk halaman 404 (halaman tidak ditemukan).
-   **`contact.view.php`**: File view untuk form kontak.
-   **`home.view.php`**: File view untuk halaman home/beranda.
-   **`invoice.view.php`**: File view untuk menampilkan detail invoice dan form pencarian invoice.
-   **`service.view.php`**: File view untuk form service request.

## Penjelasan

-   Setiap file `.view.php` adalah template HTML yang berisi kode PHP untuk menampilkan data dari controller.
-   File `components.css` berisi style CSS yang digunakan untuk mengatur tampilan elemen-elemen HTML.

## Cara Menggunakan

-   File-file view di-include oleh controller untuk menghasilkan output HTML yang ditampilkan ke pengguna.
-   File `components.css` di-link di dalam setiap file view untuk menerapkan style.

## Catatan

-   Pastikan semua file view memiliki struktur HTML yang valid.
-   Gunakan class CSS dari `components.css` untuk mengatur tampilan elemen-elemen HTML.
-   Hindari menulis kode PHP yang terlalu kompleks di dalam file view. Sebaiknya logika yang kompleks dipindahkan ke controller.