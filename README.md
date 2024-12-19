# Proyek Pengembangan Basis Data Kaifada Shop 4
 Sistem basis data untuk aplikasi manajemen inventaris dibutuhkan agar setiap data terkait inventaris, seperti stok barang, riwayat transaksi pembelian dan penjualan, serta informasi pemasok, dapat diakses dan diolah secara cepat dan akurat. Selain itu, sistem ini juga akan membantu dalam proses pengambilan keputusan bisnis, seperti kapan harus memesan barang baru, barang apa saja yang memiliki perputaran cepat, dan barang yang jarang terjual.

 ## Tujuan Proyek
  - Meningkatkan efisiensi operasional, terutama dalam hal pemantauan dan pengendalian stok barang
  - Meminimalisir kesalahan manusia (human error) dalam pencatatan dan pengelolaan barang.
  - Mempercepat proses pelaporan, baik untuk kebutuhan internal maupun eksternal.
  - Mempermudah akses informasi yang akurat dan real-time untuk mendukung pengambilan keputusan manajemen.

 ## Pengguna
  1. Owner
  2. Pemilik Toko
  3. Kasir

## Instalasi
1. Clone repositori:
   ```bash
   git clone https://github.com/Hiujalan/kaifada-mart.git
   ```
2. Masuk ke folder root project:
   ```bash
   cd kaifada-mart
   ```
3. Masuk ke folder proyek:
   ```bash
   cd basic
   ```
4. Install dependensi:
   ```bash
   npm install
   ```
5. Install depedensi dan autoload:
   ```bash
   composer install
   ```
5. **Penggunaan**
- Cara menjalankan atau menggunakan proyek.
  Jalankan server dengan perintah:
  ```bash
  php yii serve
  ```
  Jika muncul error <i>'http://localhost:8080 is taken by another process.'</i> jalankan perintah berikut:
  ```bash
  php yii serve --port 8085
  ```
  Untuk port bisa disesuaikan sesuai ketersediaan port masing masing.

