-- Hapus tabel yang ada (urutan: invoice → service_requests → contact_messages)
DROP TABLE IF EXISTS invoice;
DROP TABLE IF EXISTS service_requests;
DROP TABLE IF EXISTS contact_messages;

show tables;
-- Hapus semua data (untuk testing)
DELETE FROM contact_messages;
DELETE FROM invoice;
DELETE FROM service_requests;

-- Membuat tabel service_requests
CREATE TABLE service_requests (
  id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  nama_hp VARCHAR(100) NOT NULL,
  kerusakan TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel invoice
CREATE TABLE invoice (
  id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
  service_request_id CHAR(36) NOT NULL,
  biaya_awal INT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pending', 'paid') NOT NULL DEFAULT 'pending',
  paid_at TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (service_request_id) REFERENCES service_requests(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel contact_messages
CREATE TABLE contact_messages (
  id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =========================
-- QUERY PENGECEKAN DATA
-- =========================

-- Cek semua data service_requests
SELECT * FROM service_requests;

-- Cek semua data invoice
SELECT * FROM invoice;

-- Cek semua data contact_messages
SELECT * FROM contact_messages;

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

-- =========================
-- QUERY UPDATE & DELETE DATA
-- =========================

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