# TODO: Perbaikan Bug Program

## Bugs yang Ditemukan:
1. Order.php payment method: Menganggap checkoutItem sebagai single item, padahal array.
2. Order.php confirmPayment method: Tidak menangani array checkoutItem, hanya menyimpan satu detailPesanan.
3. payment.php: Total tidak konsisten (tampil tanpa pajak, summary dengan pajak).
4. Route /order/checkout: POST, tapi redirect dari Menu::orderNow menggunakan GET.
5. Cart.php: Ada method checkout yang tidak digunakan.

## Langkah Perbaikan:
- [x] Perbaiki Order.php payment method untuk menangani array checkoutItem dan hitung total dengan benar.
- [x] Perbaiki Order.php confirmPayment method untuk loop array dan insert multiple detailPesanan.
- [x] Update payment.php untuk total konsisten (tanpa pajak).
- [x] Ubah route /order/checkout ke GET.
- [x] Hapus method Cart::checkout yang tidak digunakan.
- [x] Pastikan checkout.php menangani array dengan benar.
- [x] Perbaiki Order::checkout untuk menangani checkoutItem dari menu detail.
- [x] Tambahkan input qty di form menu_detail.php.
- [x] Perbaiki TypeError: Cannot access offset of type string on string di Order::checkout.
