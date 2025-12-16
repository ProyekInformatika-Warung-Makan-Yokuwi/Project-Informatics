<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<div class="container my-4">
  <h3 class="mb-4">📜 Riwayat Pesanan</h3>

  <?php if (empty($pesanan)): ?>
    <div class="alert alert-info">
      Belum ada riwayat pesanan.
    </div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>ID Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Total</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pesanan as $p): ?>
          <tr>
            <td>#<?= $p['idPesanan'] ?></td>
            <td><?= esc($p['namaPelanggan']) ?></td>
            <td>Rp <?= number_format($p['total'],0,',','.') ?></td>
            <td><?= esc($p['metodePembayaran']) ?></td>
            <td>
              <span class="badge 
                <?= $p['statusPembayaran'] == 'Siap' ? 'bg-success' : 'bg-warning' ?>">
                <?= esc($p['statusPembayaran']) ?>
              </span>
            </td>
            <td><?= date('d-m-Y H:i', strtotime($p['waktuPemesanan'])) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
