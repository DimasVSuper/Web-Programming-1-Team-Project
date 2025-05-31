show tables;

-- Pengechekan 
SELECT sr.id, sr.nama, sr.email, i.id AS invoice_id
FROM service_requests sr
LEFT JOIN invoice i ON i.service_request_id = sr.id
WHERE sr.nama = 'dimasdimas' AND sr.email = 'dimasdimas@gmail.com';
show create table invoice;
-- Input Biaya
INSERT INTO invoice (service_request_id, biaya_awal)
VALUES ('87de57f5-3b68-11f0-ab02-a036bc3103e4', 100000);

ALTER TABLE invoice CHANGE biaya biaya_awal INT;
ALTER TABLE invoice DROP COLUMN deskripsi_teknisi;

-- Hapus tabel-tabel yang ada (hati-hati saat digunakan di produksi)
DROP TABLE payments;
DROP TABLE invoice;
DROP TABLE service_requests;

-- Membuat tabel service_requests
CREATE TABLE `service_requests` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_hp` varchar(100) NOT NULL,
  `kerusakan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel invoice
CREATE TABLE invoice (
  id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
  service_request_id CHAR(36) NOT NULL,
  biaya_awal INT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (service_request_id) REFERENCES service_requests(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel payments
CREATE TABLE payments (
  id CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
  invoice_id CHAR(36) NOT NULL,
  status ENUM('pending', 'paid') NOT NULL DEFAULT 'pending',
  paid_at TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (invoice_id) REFERENCES invoice(id)
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

show tables;