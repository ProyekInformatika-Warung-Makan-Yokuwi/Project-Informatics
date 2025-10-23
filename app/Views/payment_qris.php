<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5 bg-light">
  <div class="container text-center">
    <h1 class="fw-bold text-danger mb-4">📱 Pembayaran via QRIS</h1>
    <p class="text-muted mb-5">Silakan scan kode QR di bawah untuk melakukan pembayaran.</p>

    <div class="card shadow-sm border-0 mx-auto mb-4" style="max-width: 400px;">
      <div class="card-body">
        <img src="<?= base_url('images/qris-example.png') ?>" 
             alt="QRIS Code" 
             class="img-fluid rounded-3 mb-3"
             style="max-height: 350px; object-fit: contain;">
        <p class="text-muted small">*Gambar QRIS hanya simulasi</p>
      </div>
    </div>

    <form action="/order/success" method="get">
      <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 fw-semibold">
        ✅ Saya Sudah Bayar
      </button>
    </form>

    <a href="/menu" class="d-block mt-4 text-decoration-none text-secondary">
      ← Kembali ke Menu
    </a>
  </div>
</section>

<?= $this->endSection() ?>
