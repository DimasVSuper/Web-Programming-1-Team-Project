# 📄 Folder `view`

Folder ini berisi semua file sumber (**view**) yang terkait dengan tampilan aplikasi RISSCELL.

---

## 📁 Struktur

- **`404.view.php`**  
  Halaman error 404 (halaman tidak ditemukan).
- **`contact.view.php`**  
  Form kontak, notifikasi menggunakan modal Bootstrap, sudah dilengkapi CSRF token.
- **`home.view.php`**  
  Halaman home/beranda, header transparan, animasi, dan base URL dinamis.
- **`invoice.view.php`**  
  Detail invoice, pencarian invoice, form pembayaran dengan CSRF token, dan modal notifikasi pembayaran.
- **`service.view.php`**  
  Form service request, dengan modal feedback sukses, sudah dilengkapi CSRF token.

---

## ℹ️ Penjelasan

- Setiap file `.view.php` adalah template HTML+PHP yang menampilkan data dari controller.
- Semua style dan animasi menggunakan Bootstrap 5 dan custom CSS langsung di masing-masing file view.
- **Tidak menggunakan file CSS eksternal seperti `components.css`**; semua kebutuhan styling langsung di dalam file view terkait.
- Form penting (kontak, service, pembayaran invoice) sudah menggunakan CSRF token untuk keamanan.

---

## 🚀 Cara Menggunakan

- File view di-include oleh controller untuk menghasilkan output HTML ke pengguna.
- Notifikasi sukses/gagal pada form menggunakan modal Bootstrap, bukan alert biasa.
- Untuk menambah tampilan baru, buat file `.view.php` di folder ini dan tambahkan custom CSS jika diperlukan.
- Pastikan setiap form POST menyertakan CSRF token dari controller.

---

## 📝 Catatan

- Pastikan semua file view memiliki struktur HTML yang valid dan konsisten.
- Gunakan class CSS Bootstrap dan custom CSS di masing-masing file view.
- Hindari logika PHP kompleks di file view; letakkan di controller atau model.
- Semua kebutuhan tampilan kini terpusat di folder ini, tanpa dependensi CSS eksternal selain Bootstrap.
- Untuk keamanan, selalu validasi CSRF token di controller saat menerima request.