# 📚 Library Management System (Sistem Manajemen Perpustakaan)

Aplikasi manajemen perpustakaan berbasis web yang digunakan untuk mengelola data buku, mahasiswa (peminjam), petugas, serta transaksi peminjaman yang dilengkapi dengan sistem denda otomatis.

## 🚀 Fitur Utama

* **Manajemen Buku (CRUD):** Pengelolaan data buku secara lengkap.
* **Manajemen Mahasiswa & Petugas:** Fitur CRUD untuk data peminjam dan staf.
* **Sistem Peminjaman:** Pencatatan transaksi pinjam dan kembali secara real-time.
* **Sistem Denda:** Perhitungan denda otomatis jika pengembalian melewati batas waktu.
* **Pencarian Lanjut:** Mencari data berdasarkan kode, judul, atau kategori buku.

## 🛠 Detail Teknis Implementasi

Aplikasi ini dibangun dengan standar pengembangan modern:

1.  **Migration:** Database dibangun menggunakan fitur Migration untuk memastikan struktur tabel (Buku, Mahasiswa, Petugas, Transaksi) konsisten.
2.  **Seeder:** Tersedia data awal (dummy data) sebanyak **20 data** yang mencakup **4 kategori buku** berbeda untuk keperluan pengujian sistem.
3.  **Arsitektur MVC:** Menggunakan pola *Model-View-Controller* untuk pemisahan logika bisnis, database, dan tampilan interface.
4.  **Fitur Pencarian (Nilai Tambah):** Pengguna dapat melakukan filter atau pencarian data berdasarkan:
    * `kode_buku`
    * `judul_buku`
    * `kategori_buku`
