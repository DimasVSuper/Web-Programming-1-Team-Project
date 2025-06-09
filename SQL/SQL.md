# 📖 RISSCELL SQL Queries Documentation

Dokumen ini berisi kumpulan query SQL utama yang digunakan dalam proyek **RISSCELL**.  
Silakan sesuaikan query dan struktur tabel sesuai kebutuhan aplikasi Anda.

---

## Daftar Isi

- [Tabel `contact_messages`](#tabel-contact_messages)
- [Tabel `service_requests`](#tabel-service_requests)
- [Tabel `invoice`](#tabel-invoice)
- [Relasi & Query Join](#relasi--query-join)
- [Query Update & Delete](#query-update--delete)
- [Penjelasan](#penjelasan)

---

## Tabel `contact_messages`

### Membuat Tabel

```sql
CREATE TABLE contact_messages (
    id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### Insert Data

```sql
INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?);
```

### Select Data

```sql
SELECT * FROM contact_messages WHERE email = ?;
```

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

## Relasi & Query Join

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

### Join Semua Service Requests dengan Invoice (LEFT JOIN)

```sql
SELECT
    service_requests.id AS service_request_id,
    service_requests.nama,
    service_requests.email,
    service_requests.nama_hp,
    service_requests.kerusakan,
    invoice.id AS invoice_id,
    invoice.biaya_awal,
    invoice.status,
    invoice.paid_at
FROM service_requests
LEFT JOIN invoice ON invoice.service_request_id = service_requests.id;
```

---

## Query Update & Delete

### Update Status Invoice Menjadi Paid

```sql
UPDATE invoice
SET status = 'paid', paid_at = NOW()
WHERE id = ?;
```

### Hapus Invoice Berdasarkan Nama & Email Customer

```sql
DELETE invoice FROM invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id
WHERE service_requests.nama = ? AND service_requests.email = ?;
```

### Hapus Service Request Berdasarkan Nama & Email

```sql
DELETE FROM service_requests
WHERE nama = ? AND email = ?;
```

### Hapus Contact Message Berdasarkan Email

```sql
DELETE FROM contact_messages
WHERE email = ?;
```

---

## Penjelasan

- Semua query menggunakan UUID (`CHAR(36)`) sebagai primary key.
- Status pembayaran langsung di tabel `invoice` (tanpa tabel `payments`).
- Relasi antar tabel menggunakan foreign key.
- Query join memudahkan pengambilan data invoice beserta detail customer/service.
- Silakan sesuaikan query dan struktur tabel sesuai kebutuhan aplikasi Anda.

---