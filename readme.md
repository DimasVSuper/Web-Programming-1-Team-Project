# Web Programming 1 - Team Project

## Deskripsi Proyek
Proyek ini adalah sebuah website sederhana yang dibuat sebagai bagian dari tugas mata kuliah **Web Programming 1**. Website ini dirancang untuk memberikan pengalaman praktis dalam pengembangan web modern dengan menggunakan teknologi seperti **HTML**, **CSS**, **JavaScript**, dan **Bootstrap**.

## Fitur Utama
- **Struktur Halaman Modular**: Komponen halaman dikelola secara modular menggunakan JavaScript untuk mempermudah pengembangan dan pemeliharaan.
- **Desain Responsif**: Menggunakan **Bootstrap 5** untuk memastikan tampilan yang optimal di berbagai perangkat.
- **Integrasi Google Maps**: Menampilkan lokasi kampus dengan Google Maps, termasuk tombol untuk membuka lokasi di aplikasi Google Maps.
- **Efek Visual Modern**: Menggunakan efek glow dan ikon Bootstrap untuk meningkatkan estetika.
- **Navigasi Halus**: Tombol navigasi yang memungkinkan pengguna menggulir ke bagian tertentu pada halaman.

## Teknologi yang Digunakan
- **HTML5**: Untuk struktur halaman.
- **CSS3**: Untuk styling dan efek visual.
- **JavaScript (ES6)**: Untuk logika dan pengelolaan komponen.
- **Bootstrap 5**: Untuk desain responsif dan ikon.
- **Vite.js**: Sebagai bundler untuk pengembangan yang cepat.
- **GitHub Pages**: Untuk hosting proyek.

## Cara Menjalankan Proyek
1. Clone repository ini:
   ```bash
   git clone https://github.com/DimasVSuper/Web-Programming-1-Team-Project.git
   ```
2. Masuk ke direktori proyek:
   ```bash
   cd Web-Programming-1-Team-Project
   ```
3. Instal dependensi:
   ```bash
   npm install
   ```
4. Jalankan server pengembangan:
   ```bash
   npm run dev
   ```
5. Buka browser dan akses:
   ```
   http://localhost:5173
   ```

## Cara Menerbitkan ke GitHub Pages
1. Bangun proyek untuk produksi:
   ```bash
   npm run build
   ```
2. Deploy ke GitHub Pages:
   ```bash
   npm run deploy
   ```
3. Akses website Anda di:
   ```
   https://<username>.github.io/<repository-name>
   ```

## Struktur Proyek
```
projectwebpro1/
├── src/
│   ├── components/       # Komponen halaman modular
│   │   ├── homehero1.js  # Hero section 1
│   │   ├── homehero2.js  # Hero section 2
│   │   ├── homehero3.js  # Hero section 3
│   │   ├── homehero4.js  # Hero section 4
│   │   ├── location.js   # Komponen lokasi
│   │   ├── components.css # Styling untuk komponen
│   ├── home.js           # Halaman utama
│   ├── main.js           # Entry point aplikasi
│   ├── style.css         # Styling global
├── index.html            # File HTML utama
├── package.json          # Konfigurasi npm
├── vite.config.js        # Konfigurasi Vite.js
├── build/                # Folder hasil build untuk produksi
└── .gitignore            # File yang diabaikan Git
```

## Anggota Tim
- **Dimas Bayu Nugroho**
- **Alexa Cindy**
- **Siti Jamilah**
- **Shafyya Putri M**

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](https://en.wikipedia.org/wiki/MIT_License). Untuk informasi lebih lanjut tentang MIT License, kunjungi [Wikipedia - MIT License](https://en.wikipedia.org/wiki/MIT_License).