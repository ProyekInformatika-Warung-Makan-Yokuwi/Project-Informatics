# TODO: Tambahkan Tombol Riwayat Pemesanan

## Status: In Progress

### 1. Tambahkan Route untuk Riwayat Pemesanan
- [ ] Tambahkan route di `app/Config/Routes.php` untuk halaman riwayat pemesanan

### 2. Tambahkan Method di Controller Admin
- [ ] Tambahkan method `riwayatPemesanan()` di `app/Controllers/Admin.php` untuk menampilkan halaman riwayat pemesanan

### 3. Buat View Riwayat Pemesanan
- [ ] Buat view `app/Views/riwayat_pemesanan.php` dengan tabel data pesanan dari database
- [ ] Pastikan view mendukung dark mode

### 4. Tambahkan Tombol di Dropdown Akun
- [ ] Tambahkan tombol "Riwayat Pemesanan" di dropdown akun di `app/Views/layouts/layout_modern.php`
- [ ] Pastikan tombol hanya muncul untuk role 'pemilik'

### 5. Testing dan Verifikasi
- [ ] Test akses halaman riwayat pemesanan
- [ ] Verifikasi dark mode berfungsi dengan baik
- [ ] Pastikan data pesanan ditampilkan dengan benar
