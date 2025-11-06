<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-danger text-center text-white py-5" style="background: linear-gradient(145deg, #c82333, #dc3545);">
  <div class="container">
    <h1 class="fw-bold mb-4 display-3 animate__animated animate__fadeIn">Selamat Datang di Warung Makan Yokuwi</h1>
    <p class="lead text-light mb-4 animate__animated animate__fadeIn animate__delay-1s">
      Nikmati cita rasa masakan rumahan yang lezat, bergizi, dan dibuat dengan sepenuh hati ❤️
    </p>
    <a href="/menu" class="btn btn-light btn-lg rounded-pill shadow-lg mb-2 animate__animated animate__fadeIn animate__delay-2s">Lihat Menu Kami</a>
  </div>
</section>

<!-- Tentang Kami -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="<?= base_url('images/warung.png') ?>" alt="Warung Makan Yokuwi" class="img-fluid rounded-4 shadow-lg animate__animated animate__fadeIn animate__delay-1s">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold text-danger mb-3 display-4 animate__animated animate__fadeIn animate__delay-1s">Tentang Yokuwi</h2>
        <p class="text-muted fs-5 mb-4 animate__animated animate__fadeIn animate__delay-2s">
          Warung Makan <strong>Yokuwi</strong> hadir untuk membawa suasana makan seperti di rumah sendiri. Kami menyajikan berbagai hidangan khas nusantara dengan bahan segar, cita rasa otentik, dan harga bersahabat.
        </p>
        <ul class="list-unstyled text-muted fs-5 animate__animated animate__fadeIn animate__delay-3s">
          <li>🍛 Masakan rumahan yang autentik</li>
          <li>🥗 Bahan segar setiap hari</li>
          <li>💸 Harga hemat untuk semua kalangan</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="text-center bg-danger text-white py-5" style="background: #c82333;">
  <div class="container">
    <h3 class="fw-bold mb-3 display-4 animate__animated animate__fadeIn animate__delay-1s">Siap Menikmati Makanan Lezat Hari Ini?</h3>
    <p class="mb-4 fs-4 animate__animated animate__fadeIn animate__delay-2s">Datang langsung ke Warung Makan Yokuwi atau pesan sekarang juga!</p>
    <a href="/kontak" class="btn btn-light btn-lg rounded-pill fw-bold shadow-lg animate__animated animate__fadeIn animate__delay-3s">Hubungi Kami</a>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>

<?= $this->endSection() ?>
