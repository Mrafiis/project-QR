-- Jalankan satu kali pada database yang sudah ada sebelum memakai pendaftaran akun admin pertama.
-- Kolom email dibuat nullable agar data admin dan laporan lama tetap tersimpan.
ALTER TABLE admins
    MODIFY username VARCHAR(190) NULL,
    ADD COLUMN email VARCHAR(190) NULL;

CREATE UNIQUE INDEX uq_admins_email ON admins (email);
