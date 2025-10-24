<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<?php
// Pastikan $items dan $total terdefinisi agar view tidak error
$items = $items ?? (isset($item) ? [$item] : []);
$total = $total ?? 0;
?>

<section class="py-5" style="background: linear-gradient(180deg, #fff6f6 0%, #ffffff 100%); min-height: 100vh;">
  <div class="container">

    <!-- ✅ Progress Steps (3 tahap: Checkout - Pembayaran - Selesai) -->
    <div class="text-center mb-5">
      <div class="d-flex justify-content-center align-items-center gap-3">
        <div class="step active">1</div>
        <div class="line"></div>
        <div class="step">2</div>
        <div class="line"></div>
        <div class="step">3</div>
      </div>
      <div class="mt-3 text-muted small fw-semibold">
        <span class="text-danger">Checkout</span> &nbsp;→&nbsp; Pembayaran &nbsp;→&nbsp; Selesai
      </div>
    </div>

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
        <a href="/menu" class="btn btn-outline-danger rounded-pill me-2 px-4 py-2 fw-semibold">Kembali ke Menu</a>
        <a href="/order/payment" class="btn btn-danger rounded-pill px-4 py-2 fw-semibold">Lanjut ke Pembayaran</a>
      </div>
    <?php else: ?>
      <p class="text-center text-muted">Tidak ada item untuk checkout.</p>
      <div class="text-center mt-3">
        <a href="/menu" class="btn btn-danger rounded-pill">Kembali ke Menu</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ✅ Style Progress Step -->
<style>
  .step {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #f0f0f0;
    color: #999;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .step.active {
    background: #dc3545;
    color: #fff;
    box-shadow: 0 0 8px rgba(220, 53, 69, 0.5);
  }
  .line {
    width: 60px;
    height: 3px;
    background: #f0f0f0;
  }
  .step.active + .line {
    background: #dc3545;
  }
</style>

<?= $this->endSection() ?>
