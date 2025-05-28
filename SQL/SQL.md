# 📖 RISSCELL SQL Queries Documentation

Dokumen ini berisi kumpulan query SQL yang digunakan dalam proyek **RISSCELL**. Anda dapat menyesuaikan isi dokumen ini sesuai dengan kebutuhan dan struktur proyek Anda.

---

## Daftar Isi

- [Tabel `service_requests`](#tabel-service_requests)
- [Tabel `invoice`](#tabel-invoice)
- [Tabel `payments`](#tabel-payments)
- [Relasi Tabel & Contoh Join](#relasi-tabel--contoh-join)
- [Penjelasan](#penjelasan)

---

## Tabel `service_requests`

### Membuat Tabel

```sql
CREATE TABLE `service_requests` (
    `id` char(36) NOT NULL DEFAULT uuid(),
    `nama` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `nama_hp` varchar(100) NOT NULL,
    `kerusakan` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### Insert Data

```sql
INSERT INTO service_requests (nama, email, nama_hp, kerusakan) VALUES (?, ?, ?, ?);
```

### Select Data

```sql
SELECT * FROM service_requests WHERE nama = ? AND email = ?;
```

---

## Tabel `invoice`

### Membuat Tabel

```sql
CREATE TABLE invoice (
    id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    service_request_id CHAR(36) NOT NULL,
    biaya_awal INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_request_id) REFERENCES service_requests(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### Insert Data

```sql
INSERT INTO invoice (service_request_id, biaya_awal) VALUES (?, ?);
```

### Select Data

```sql
SELECT * FROM invoice WHERE id = ?;
```

---

## Tabel `payments`

### Membuat Tabel

```sql
CREATE TABLE payments (
    id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    invoice_id CHAR(36) NOT NULL,
    status ENUM('pending', 'paid') NOT NULL DEFAULT 'pending',
    paid_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (invoice_id) REFERENCES invoice(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### Update Data

```sql
UPDATE payments SET status = 'paid', paid_at = NOW() WHERE invoice_id = ?;
```

---

## Relasi Tabel & Contoh Join

```sql
SELECT sr.id, sr.nama, sr.email, i.id AS invoice_id
FROM service_requests sr
LEFT JOIN invoice i ON i.service_request_id = sr.id
WHERE sr.nama = ? AND sr.email = ?;
```

---

## Penjelasan

- Dokumen ini memberikan gambaran umum tentang query SQL yang digunakan dalam aplikasi.
- Dijelaskan query untuk setiap tabel, termasuk membuat tabel, insert data, select data, dan update data.
- Ditambahkan contoh query dengan join untuk menampilkan relasi antar tabel.
- Ditambahkan catatan untuk memberikan panduan dalam penggunaan query SQL.

---

**Catatan:**  
Silakan sesuaikan query dan struktur tabel sesuai kebutuhan proyek Anda.