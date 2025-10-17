<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-light text-center py-5">
  <div class="container">
    <h1 class="fw-bold mb-3 text-danger">Selamat Datang di Warung Makan Yokuwi</h1>
    <p class="lead text-muted mb-4">
      Nikmati cita rasa masakan rumahan yang lezat, bergizi, dan dibuat dengan sepenuh hati ❤️
    </p>
    <a href="/menu" class="btn btn-danger btn-lg rounded-pill shadow-sm mb-2">Lihat Menu Kami</a>
  </div>
</section>

<!-- Tentang Kami -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="<?= base_url('images/warung.png') ?>" alt="Warung Makan Yokuwi" class="img-fluid rounded-4 shadow">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold text-danger mb-3">Tentang Yokuwi</h2>
        <p class="text-muted">
          Warung Makan <strong>Yokuwi</strong> hadir untuk membawa suasana makan seperti di rumah sendiri.
          Kami menyajikan berbagai hidangan khas nusantara dengan bahan segar, cita rasa otentik, dan harga bersahabat.
        </p>
        <ul class="list-unstyled text-muted">
          <li>🍛 Masakan rumahan yang autentik</li>
          <li>🥗 Bahan segar setiap hari</li>
          <li>💸 Harga hemat untuk semua kalangan</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="text-center bg-danger text-white py-5">
  <div class="container">
    <h3 class="fw-bold mb-3">Siap Menikmati Makanan Lezat Hari Ini?</h3>
    <p class="mb-4">Datang langsung ke Warung Makan Yokuwi atau pesan sekarang juga!</p>
    <a href="/kontak" class="btn btn-light btn-lg rounded-pill fw-bold shadow-sm">Hubungi Kami</a>
  </div>
</section>

<?= $this->endSection() ?>
