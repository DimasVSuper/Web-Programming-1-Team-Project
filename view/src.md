# 📄 Folder `view`

Folder ini berisi semua file sumber (**view**) yang terkait dengan tampilan aplikasi RISSCELL.

---

## 📁 Struktur

- **`404.view.php`**  
  Halaman error 404 (halaman tidak ditemukan), tampil responsif dan informatif.
- **`contact.view.php`**  
  Form kontak, notifikasi menggunakan modal Bootstrap, sudah dilengkapi CSRF token dan AJAX.
- **`home.view.php`**  
  Halaman home/beranda, header transparan, animasi, carousel, dan tampilan responsif.
- **`invoice.view.php`**  
  Detail invoice, pencarian invoice, form pembayaran dengan CSRF token, AJAX, dan modal notifikasi pembayaran.
- **`service.view.php`**  
  Form service request, dengan modal feedback sukses, AJAX, dan sudah dilengkapi CSRF token.

---

## ℹ️ Penjelasan

- Setiap file `.view.php` adalah template HTML+PHP yang menampilkan data dari controller.
- Semua style dan animasi menggunakan Bootstrap 5, Bootstrap Icons, dan custom CSS langsung di masing-masing file view.
- **Tidak menggunakan file CSS eksternal seperti `components.css`**; semua kebutuhan styling langsung di dalam file view terkait.
- Semua form penting (kontak, service, pembayaran invoice) sudah menggunakan CSRF token untuk keamanan dan AJAX untuk pengalaman pengguna yang lebih baik.
- Modal Bootstrap digunakan untuk notifikasi sukses/gagal, bukan alert biasa.

---

## 🚀 Cara Menggunakan

- File view di-include oleh controller untuk menghasilkan output HTML ke pengguna.
- Notifikasi sukses/gagal pada form menggunakan modal Bootstrap, bukan alert biasa.
- Untuk menambah tampilan baru, buat file `.view.php` di folder ini dan tambahkan custom CSS jika diperlukan.
- Pastikan setiap form POST menyertakan CSRF token dari controller.
- Jika menambah form baru, gunakan AJAX dan modal Bootstrap untuk feedback user.

---

## 📝 Catatan

- Pastikan semua file view memiliki struktur HTML yang valid dan konsisten.
- Gunakan class CSS Bootstrap dan custom CSS di masing-masing file view.
- Hindari logika PHP kompleks di file view; letakkan di controller atau model.
- Semua kebutuhan tampilan kini terpusat di folder ini, tanpa dependensi CSS eksternal selain Bootstrap.
- Untuk keamanan, selalu validasi CSRF token di controller saat menerima request.
- Jika menggunakan AJAX, reload halaman setelah submit sukses agar CSRF token baru diambil.

## META TAG SEO

- ✅ Setiap file view sudah dilengkapi meta tag SEO yang lengkap, seperti `<title>`, `<meta name="description">`, dan `<meta name="keywords">` untuk membantu mesin pencari memahami isi halaman.
- 🌐 Terdapat juga meta tag Open Graph (og:...) dan Twitter Card untuk optimasi tampilan saat link dibagikan ke media sosial seperti WhatsApp, Facebook, dan X (Twitter).
- 🏷️ Pastikan setiap halaman memiliki judul (`<title>`) dan deskripsi (`<meta name="description">`) yang unik dan relevan agar hasil pencarian lebih optimal.
- 🚀 Penggunaan meta tag SEO ini membantu meningkatkan visibilitas website di mesin pencari dan membuat tampilan link lebih menarik saat dibagikan di media sosial.

## Penjelasan SEO

SEO (**Search Engine Optimization**) adalah serangkaian teknik untuk meningkatkan visibilitas dan peringkat website di hasil pencarian mesin pencari seperti Google.  
Pada aplikasi RISSCELL, setiap halaman view sudah dilengkapi meta tag SEO yang penting, seperti:

- 📝 **Title dan Description:** Membantu mesin pencari memahami isi dan tujuan halaman, serta meningkatkan kemungkinan halaman muncul di hasil pencarian yang relevan.
- 🔑 **Meta Keywords:** Memberikan kata kunci tambahan, meskipun saat ini tidak terlalu berpengaruh untuk Google.
- 📲 **Open Graph & Twitter Card:** Membuat tampilan link lebih menarik dan informatif saat dibagikan di media sosial seperti WhatsApp, Facebook, dan X (Twitter).
- 🤖 **Meta Robots:** Mengatur apakah halaman boleh diindeks oleh mesin pencari.
- 📍 **Meta Geo & Author:** Memberikan informasi lokasi dan penulis, membantu branding dan relevansi lokal.

Dengan penerapan meta tag SEO yang konsisten dan relevan di setiap halaman, website akan lebih mudah ditemukan oleh calon pelanggan dan tampil lebih profesional saat dibagikan di media sosial.
