# 📄 Folder `view`

Folder ini berisi semua file sumber (**view**) yang terkait dengan tampilan aplikasi.

---

## 📁 Struktur

- **`404.view.php`**  
  Halaman 404 (halaman tidak ditemukan).
- **`contact.view.php`**  
  Form kontak, notifikasi menggunakan modal Bootstrap.
- **`home.view.php`**  
  Halaman home/beranda, header transparan dan animasi.
- **`invoice.view.php`**  
  Detail invoice, pencarian invoice, dan modal notifikasi pembayaran.
- **`service.view.php`**  
  Form service request, dengan modal feedback sukses.

---

## ℹ️ Penjelasan

- Setiap file `.view.php` adalah template HTML+PHP yang menampilkan data dari controller.
- Semua style dan animasi menggunakan Bootstrap 5 dan custom CSS langsung di masing-masing file view.
- **Sudah tidak menggunakan file `components.css` terpisah.**  
  Semua kebutuhan styling langsung di dalam file view terkait.

---

## 🚀 Cara Menggunakan

- File view di-include oleh controller untuk menghasilkan output HTML ke pengguna.
- Notifikasi sukses/gagal pada form menggunakan modal Bootstrap, bukan alert biasa.
- Untuk menambah tampilan baru, buat file `.view.php` di folder ini dan tambahkan custom CSS jika diperlukan.

---

## 📝 Catatan

- Pastikan semua file view memiliki struktur HTML yang valid dan konsisten.
- Gunakan class CSS Bootstrap dan custom CSS di masing-masing file view.
- Hindari logika PHP kompleks di file view; letakkan di controller atau model.
- Semua kebutuhan tampilan kini terpusat di folder ini, tanpa dependensi CSS eksternal selain Bootstrap.

---