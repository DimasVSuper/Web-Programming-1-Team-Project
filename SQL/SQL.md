# 📖 RISSCELL SQL Queries Documentation

Dokumen ini berisi kumpulan query SQL utama yang digunakan dalam proyek **RISSCELL**.  
Silakan sesuaikan query dan struktur tabel sesuai kebutuhan aplikasi Anda.

---

## Daftar Isi

- [Reset & Hapus Data](#reset--hapus-data)
- [Membuat Tabel](#membuat-tabel)
  - [Tabel `service_requests`](#tabel-service_requests)
  - [Tabel `invoice`](#tabel-invoice)
  - [Tabel `contact_messages`](#tabel-contact_messages)
- [Query Pengecekan Data](#query-pengecekan-data)
- [Query Join](#query-join)
- [Query Update & Delete](#query-update--delete)
- [Penjelasan](#penjelasan)

---

## Reset & Hapus Data

> **Urutan penghapusan:** invoice → service_requests → contact_messages

```sql
-- Hapus tabel jika ada (urutan: invoice → service_requests → contact_messages)
DROP TABLE IF EXISTS invoice;
DROP TABLE IF EXISTS service_requests;
DROP TABLE IF EXISTS contact_messages;

-- Cek tabel yang ada
SHOW TABLES;

-- Hapus semua data (untuk testing, jika tidak ingin drop tabel)
DELETE FROM contact_messages;
DELETE FROM invoice;
DELETE FROM service_requests;
```

---

## Membuat Tabel

### Tabel `service_requests`

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

### Tabel `invoice`

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

### Tabel `contact_messages`

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

---

## Query Pengecekan Data

```sql
-- Cek semua data service_requests
SELECT * FROM service_requests;

-- Cek semua data invoice
SELECT * FROM invoice;

-- Cek semua data contact_messages
SELECT * FROM contact_messages;
```

---

## Query Join

```sql
-- Cek invoice beserta data customer (tanpa singkatan)
SELECT
    invoice.id AS invoice_id,
    service_requests.nama AS customer_name,
    service_requests.email AS customer_email,
    service_requests.nama_hp AS phone_name,
    service_requests.kerusakan AS damage,
    invoice.biaya_awal AS initial_cost,
    invoice.status,
    invoice.paid_at,
    invoice.created_at AS invoice_created_at
FROM invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id;

-- Cek invoice berdasarkan nama dan email customer
SELECT
    invoice.id AS invoice_id,
    service_requests.nama AS customer_name,
    service_requests.email AS customer_email,
    service_requests.nama_hp AS phone_name,
    service_requests.kerusakan AS damage,
    invoice.biaya_awal AS initial_cost,
    invoice.status,
    invoice.paid_at,
    invoice.created_at AS invoice_created_at
FROM invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id
WHERE service_requests.nama = 'dimas'
  AND service_requests.email = 'dimas@gmail.com';

-- Cek semua service_requests beserta invoice (LEFT JOIN)
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

```sql
-- Update status invoice menjadi paid
UPDATE invoice
SET status = 'paid', paid_at = NOW()
WHERE id = 'INVOICE_ID';

-- Update biaya_awal berdasarkan nama dan email customer
UPDATE invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id
SET invoice.biaya_awal = 200000
WHERE service_requests.nama = 'dimasdimas'
  AND service_requests.email = 'dumasdumas@gmail.com';

-- Hapus invoice berdasarkan nama dan email customer
DELETE invoice FROM invoice
JOIN service_requests ON invoice.service_request_id = service_requests.id
WHERE service_requests.nama = 'dimasdimas'
  AND service_requests.email = 'dimasdimas@gmail.com';

-- Hapus service_request berdasarkan nama dan email
DELETE FROM service_requests
WHERE nama = 'dimasdimas'
  AND email = 'dimasdimas@gmail.com';

-- Hapus contact_message berdasarkan email
DELETE FROM contact_messages
WHERE email = 'dimasdimas@gmail.com';
```

---

## Penjelasan

- Semua query menggunakan UUID (`CHAR(36)`) sebagai primary key.
- Status pembayaran langsung di tabel `invoice` (tanpa tabel `payments`).
- Relasi antar tabel menggunakan foreign key.
- Query join memudahkan pengambilan data invoice beserta detail customer/service.
- Silakan sesuaikan query dan struktur tabel sesuai kebutuhan aplikasi Anda.

---