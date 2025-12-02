<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<section class="min-vh-100 d-flex align-items-center justify-content-center py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);">
  <!-- Animated background particles -->
  <div class="particles">
    <div class="particle particle1">🎉</div>
    <div class="particle particle2">✨</div>
    <div class="particle particle3">💫</div>
    <div class="particle particle4">🎊</div>
    <div class="particle particle5">⭐</div>
    <div class="particle particle6">🌟</div>
  </div>
  <div class="container text-center position-relative">

    <!-- 🎁 Main card -->
    <div class="card border-0 shadow-lg p-5 rounded-5 mx-auto bg-white"
         style="max-width: 550px; z-index: 5; animation: fadeInUp 0.8s ease-out;">
      
      <!-- ✅ Animated success icon -->
      <div class="success-icon mb-4 mx-auto">
        <div class="circle bg-success d-flex align-items-center justify-content-center pulse-glow">
          <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="white" viewBox="0 0 24 24">
            <path d="M20.285 6.709a1 1 0 0 0-1.414-1.418l-9.192 9.193-4.243-4.243a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l9.849-9.846z"/>
          </svg>
        </div>
      </div>

      <h1 class="fw-bold text-success mb-3">Pembayaran Berhasil!</h1>
      <p class="text-muted mb-4">
        Terima kasih telah berbelanja di <strong>Yokuwi</strong>!<br>
        Pesanan Anda sedang kami proses dengan penuh cinta 💚.
      </p>

      <div class="bg-light p-4 rounded-4 mb-4 border">
        <h5 class="fw-semibold text-secondary mb-2">Status Pembayaran</h5>
        <p class="fs-5 text-danger fw-bold mb-1"><?= esc($status) ?></p>
        <p class="text-muted">Metode: <strong><?= esc(ucfirst($metode)) ?></strong></p>
      </div>

      <div class="d-flex flex-column gap-3 mt-3">
        <a href="/menu" class="btn btn-danger rounded-pill px-5 py-2 fw-semibold shadow-sm">
          ← Kembali ke Menu
        </a>
        <a href="/pesanan" class="btn btn-outline-success rounded-pill px-5 py-2 fw-semibold shadow-sm">
          📦 Lihat Status Pesanan
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  /* --- Fade In Card --- */
  @keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  /* --- Dog stickers --- */
  .dog-sticker-left, .dog-sticker-right {
    width: 110px;
    animation: floatDog 3s ease-in-out infinite;
    filter: drop-shadow(0 5px 5px rgba(0,0,0,0.2));
    z-index: 10;
  }

  @keyframes floatDog {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  /* --- Static Success Icon --- */
  .success-icon .circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    box-shadow: 0 0 20px rgba(76,175,80,0.3);
  }

  /* --- Buttons --- */
  .btn-danger, .btn-outline-success {
    transition: all 0.3s ease;
  }

  .btn-danger:hover {
    background-color: #b91d2a;
    transform: scale(1.05);
  }

  .btn-outline-success:hover {
    background-color: #198754;
    color: white;
    transform: scale(1.05);
  }
</style>

<?= $this->endSection() ?>
