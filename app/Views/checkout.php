<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

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
            <?php foreach ($items as $item): ?>
              <tr>
                <td><img src="<?= base_url('images/' . esc($item['gambar'])) ?>" width="80" height="80" style="object-fit: cover;" class="rounded-3"></td>
                <td><?= esc($item['nama']) ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                <td><?= $item['qty'] ?></td>
                <td>Rp <?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4" class="text-end">Total Pembayaran:</th>
              <th class="text-danger fs-5 fw-bold">Rp <?= number_format($total, 0, ',', '.') ?></th>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="text-center mt-4">
        <a href="/cart" class="btn btn-outline-danger rounded-pill me-2">Kembali ke Keranjang</a>
        <a href="#" class="btn btn-danger rounded-pill">Bayar Sekarang</a>
      </div>
    <?php else: ?>
      <p class="text-center text-muted">Tidak ada item untuk checkout.</p>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
