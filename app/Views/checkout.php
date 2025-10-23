<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<?php
// Pastikan $items dan $total terdefinisi agar view tidak error
$items = $items ?? (isset($item) ? [$item] : []);
$total = $total ?? 0;
?>

<section class="py-5">
  <div class="container">
    <h1 class="fw-bold text-center text-danger mb-5">💳 Checkout</h1>

    <?php if (!empty($items)): ?>
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead class="table-danger">
            <tr>
              <th>Gambar</th>
              <th>Nama Menu</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $it): ?>
              <?php
                // Support beberapa format key: 'nama' atau 'namaMenu'
                $nama   = $it['nama'] ?? $it['namaMenu'] ?? '-';
                $harga  = $it['harga'] ?? $it['hargaMenu'] ?? 0;
                $qty    = $it['qty'] ?? $it['quantity'] ?? 1;
                $gambar = $it['gambar'] ?? ($it['image'] ?? 'default.jpg');
                $subtotal = (float)$harga * (int)$qty;
              ?>
              <tr>
                <td>
                  <img src="<?= base_url('images/' . esc($gambar)) ?>" width="80" height="80" style="object-fit: cover;" class="rounded-3" alt="<?= esc($nama) ?>">
                </td>
                <td><?= esc($nama) ?></td>
                <td>Rp <?= number_format((float)$harga, 0, ',', '.') ?></td>
                <td><?= (int)$qty ?></td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4" class="text-end">Total Pembayaran:</th>
              <th class="text-danger fs-5 fw-bold">Rp <?= number_format((float)$total, 0, ',', '.') ?></th>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="text-center mt-4">
        <a href="/cart" class="btn btn-outline-danger rounded-pill me-2">Kembali ke Keranjang</a>
        <a href="/order/payment" class="btn btn-danger rounded-pill">Lanjut ke Pembayaran</a>
      </div>
    <?php else: ?>
      <p class="text-center text-muted">Tidak ada item untuk checkout.</p>
      <div class="text-center mt-3">
        <a href="/menu" class="btn btn-danger rounded-pill">Kembali ke Menu</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
