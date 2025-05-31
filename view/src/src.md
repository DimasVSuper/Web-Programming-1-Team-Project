# Folder `src` pada `view`

Folder ini berisi semua file sumber (source) yang terkait dengan tampilan (view) aplikasi.

## Struktur

-   **`components.css`**: File CSS untuk style komponen tampilan dan animasi (termasuk efek glass header & modal).
-   **`404.view.php`**: View untuk halaman 404 (halaman tidak ditemukan).
-   **`contact.view.php`**: View untuk form kontak, sudah menggunakan notifikasi modal (popup) Bootstrap.
-   **`home.view.php`**: View untuk halaman home/beranda, dengan header transparan (glass) dan animasi.
-   **`invoice.view.php`**: View untuk detail invoice, pencarian invoice, dan modal notifikasi pembayaran.
-   **`service.view.php`**: View untuk form service request, dengan modal feedback sukses.

## Penjelasan

-   Setiap file `.view.php` adalah template HTML+PHP yang menampilkan data dari controller.
-   File `components.css` berisi style dan animasi untuk elemen-elemen HTML, termasuk efek glass dan modal Bootstrap.

## Cara Menggunakan

-   File-file view di-include oleh controller untuk menghasilkan output HTML ke pengguna.
-   File `components.css` di-link di setiap file view untuk menerapkan style dan animasi.
-   Notifikasi sukses/gagal pada form menggunakan modal Bootstrap, bukan alert biasa.

## Catatan

-   Pastikan semua file view memiliki struktur HTML yang valid dan konsisten.
-   Gunakan class CSS dari `components.css` untuk tampilan dan animasi.
-   Hindari logika PHP kompleks di file view; letakkan di controller atau model.
-   Untuk menambah tampilan baru, buat file `.view.php` di folder ini dan link CSS jika perlu.