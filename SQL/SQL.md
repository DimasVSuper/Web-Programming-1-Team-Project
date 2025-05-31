# 📖 RISSCELL SQL Queries Documentation

Dokumen ini berisi kumpulan query SQL yang digunakan dalam proyek **RISSCELL**. Anda dapat menyesuaikan isi dokumen ini sesuai dengan kebutuhan dan struktur proyek Anda.

---

## Daftar Isi

- [Tabel `service_requests`](#tabel-service_requests)
- [Tabel `invoice`](#tabel-invoice)
- [Relasi Tabel & Contoh Join](#relasi-tabel--contoh-join)
- [Penjelasan](#penjelasan)

---

## Tabel `service_requests`

### Membuat Tabel

```sql
CREATE TABLE service_requests (
    id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nama_hp VARCHAR(100) NOT NULL,
    kerusakan TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
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
    status ENUM('pending', 'paid') NOT NULL DEFAULT 'pending',
    paid_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (service_request_id) REFERENCES service_requests(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### Insert Data

```sql
INSERT INTO invoice (service_request_id, biaya_awal) VALUES (?, ?);
```

### Update Status Pembayaran

```sql
UPDATE invoice SET status = 'paid', paid_at = NOW() WHERE id = ?;
```

### Update Biaya Awal Berdasarkan Nama & Email

```sql
UPDATE invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id
SET invoice.biaya_awal = ?
WHERE service_requests.nama = ? AND service_requests.email = ?;
```

### Select Data

```sql
SELECT * FROM invoice WHERE id = ?;
```

---

## Relasi Tabel & Contoh Join

### Join Invoice dengan Service Requests

```sql
SELECT
    invoice.id AS invoice_id,
    service_requests.nama,
    service_requests.email,
    service_requests.nama_hp,
    service_requests.kerusakan,
    invoice.biaya_awal,
    invoice.status,
    invoice.paid_at,
    invoice.created_at AS invoice_created_at
FROM invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id
WHERE service_requests.nama = ? AND service_requests.email = ?;
```

---

## Penjelasan

- Dokumen ini memberikan gambaran umum tentang query SQL yang digunakan dalam aplikasi.
- Dijelaskan query untuk setiap tabel, termasuk membuat tabel, insert data, select data, dan update data.
- Contoh query join untuk menampilkan relasi antar tabel.
- Status pembayaran sekarang langsung di tabel `invoice` (tanpa tabel `payments`).

---

**Catatan:**  
Silakan sesuaikan query dan struktur tabel sesuai kebutuhan proyek Anda.