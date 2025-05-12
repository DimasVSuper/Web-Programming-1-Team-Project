# RISSCELL - Layanan Reparasi Handphone

Proyek ini adalah aplikasi web sederhana untuk layanan reparasi handphone, khususnya di wilayah Jakarta Barat. Dibangun menggunakan PHP native, Bootstrap, dan MySQL.

## Anggota Kelompok

- Dimas Bayu Nugroho
- Alexa Cindy Safara Anasrullah
- Shafyya Putri Meyranti
- Siti Jamilah Safitri

## Fitur Utama

- **Landing Page**: Menampilkan informasi layanan, carousel, dan lokasi.
- **Form Kontak**: Pengunjung dapat mengirim pesan melalui form, data tersimpan ke database.
- **Routing Sederhana**: Menggunakan parameter `page` untuk navigasi antar halaman.
- **Halaman 404**: Menampilkan pesan jika halaman tidak ditemukan.
- **Desain Responsif**: Menggunakan Bootstrap dan custom CSS.
- **Lokasi Google Maps**: Menampilkan lokasi toko/service center.

## Cara Menjalankan

1. Salin folder proyek ke dalam `htdocs` XAMPP.
2. Buat database MySQL dengan nama `risscell` dan tabel `contact_messages`:
   ```sql
   CREATE TABLE contact_messages (
     id CHAR(36) NOT NULL,
     name VARCHAR(255) NOT NULL,
     email VARCHAR(255) NOT NULL,
     subject TEXT NOT NULL,
     message TEXT NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT current_timestamp(),
     PRIMARY KEY (id)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
   ;```
3. Pastikan konfigurasi database di database/contactDB.php sudah sesuai.
4. Jalankan XAMPP dan akses melalui browser:

## Dependensi

- PHP >= 7.x
- MySQL/MariaDB
- XAMPP (untuk pengembangan lokal)
- Bootstrap 5 (CDN)
- Bootstrap Icons (CDN)

## Catatan

- File `.gitignore` sudah disiapkan untuk menghindari file sensitif dan folder yang tidak perlu diupload ke repository.
- Untuk menambah halaman baru, edit file `routing/route.php` dan tambahkan view baru di `view/src/`.
- **Routing menggunakan query string:**  
  Navigasi antar halaman dilakukan dengan parameter `page` pada URL, misalnya:  
  - `?page=home` untuk halaman utama  
  - `?page=contact` untuk halaman kontak  
  Jika parameter tidak sesuai, maka akan diarahkan ke halaman 404.  
  Untuk menambah halaman baru, cukup tambahkan pada array `$routes` di file `routing/route.php` dan buat file view-nya di `view/src/`.

---

**Lisensi:** Bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.
