[USERNAME DAN PASSWORD]
Email => admin@gmail.com | Password =>  12345678
Email => atasan@gmail.com | Password => 12345678

[PHP VERSION]
PHP 8.3.7

[DATABASE VERSION]
MySQL 5.7.24

[FRAMEWORK]
Laravel

[PANDUAN APLIKASI]
Panduan Penggunaan Aplikasi
1. Login dan Registrasi Akun
Registrasi Akun
Akses Halaman Registrasi

Kunjungi URL: /register.
Halaman ini menyediakan form untuk mendaftar akun baru.
Isi Form Registrasi

Masukkan informasi yang diperlukan seperti nama, email, password, dan konfirmasi password.
Pilih peran (role) jika ada pilihan (misalnya, Admin, Atasan).
Klik tombol Register untuk membuat akun baru.
Verifikasi Akun

Jika aplikasi menggunakan verifikasi email, cek inbox email untuk link verifikasi dan klik untuk mengaktifkan akun.
Login Akun
Akses Halaman Login

Kunjungi URL: /login.
Halaman ini menyediakan form untuk login.
Masukkan Informasi Login

Masukkan email dan password yang telah didaftarkan.
Klik tombol Login.
Akses Halaman Dashboard

Setelah login berhasil, pengguna akan diarahkan ke dashboard sesuai dengan role mereka:
Admin: Dapat melihat dashboard admin.
Atasan: Dapat melihat halaman persetujuan pemesanan kendaraan.
2. Pemesanan Kendaraan
Akses Halaman Pemesanan

Kunjungi URL: /orders/create.
Halaman ini menyediakan form untuk membuat pemesanan kendaraan baru.
Isi Form Pemesanan

Masukkan informasi yang diperlukan:
Konsumsi BBM: Jumlah konsumsi BBM yang diperkirakan.
Jadwal Service: Jadwal rencana service kendaraan.
Riwayat Pemakaian: Riwayat penggunaan kendaraan.
Nama Driver: Nama driver (opsional).
Atasan: Pilih atasan yang akan menyetujui pemesanan.
Klik tombol Submit untuk mengirimkan pemesanan.
3. Persetujuan Pemesanan
Akses Halaman Persetujuan

Kunjungi URL: /atasan/permintaan.
Halaman ini menampilkan daftar pemesanan kendaraan yang memerlukan persetujuan.
Review Daftar Pemesanan

Lihat daftar pemesanan yang masih dalam status pending.
Periksa detail pemesanan seperti konsumsi BBM, jadwal service, dan nama driver.
Setujui Pemesanan

Klik tombol Setujui di samping pemesanan yang ingin disetujui.
Status pemesanan akan diperbarui menjadi approved.
4. Ekspor Data ke Excel
Akses Halaman Persetujuan

Kunjungi URL: /atasan/permintaan.
Halaman ini menampilkan daftar pemesanan yang dapat diekspor.
Ekspor Data ke Excel

Klik tombol Export ke Excel di halaman persetujuan.
File Excel (permintaan-kendaraan.xlsx) akan diunduh secara otomatis.
Buka file Excel untuk melihat daftar pemesanan kendaraan dalam format spreadsheet.
Penjelasan Teknis
Controller dan Route Setup
AuthController untuk autentikasi dan pendaftaran.
OrderController untuk mengelola pemesanan kendaraan.
AtasanController untuk persetujuan pemesanan dan ekspor ke Excel.
Routes:
/register dan /login untuk registrasi dan login.
/orders/create untuk membuat pemesanan.
/atasan/permintaan untuk menampilkan dan menyetujui pemesanan.
/atasan/export untuk mengekspor data ke Excel.
Export Class
OrdersExport untuk menyiapkan data yang akan diekspor ke Excel dengan Laravel Excel.
View Files
resources/views/auth/register.blade.php dan resources/views/auth/login.blade.php untuk halaman registrasi dan login.
resources/views/orders/create.blade.php untuk form pemesanan.
resources/views/atasan/permintaan.blade.php untuk menampilkan dan menyetujui pemesanan serta tombol ekspor.