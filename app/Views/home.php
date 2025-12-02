<?php $this->setVar('title', 'Warung Makan Yokuwi - Makanan Rumahan Lezat'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<!-- Hero Section with Enhanced Design -->
<section class="hero-section position-relative overflow-hidden">
  <div class="hero-bg-gradient"></div>
  <div class="floating-shapes">
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
  </div>
  <div class="container position-relative">
    <div class="row align-items-center min-vh-75">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-2 fw-bold text-white mb-4 animate__animated animate__fadeIn animate__delay-1s">
          Selamat Datang di <span class="text-warning">Warung Makan Yokuwi</span>
        </h1>
        <p class="lead text-light mb-5 fs-4 animate__animated animate__fadeIn animate__delay-2s">
          Nikmati cita rasa masakan rumahan yang lezat, bergizi, dan dibuat dengan sepenuh hati ❤️
        </p>
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start animate__animated animate__fadeIn animate__delay-3s">
          <a href="/menu" class="btn btn-light btn-xl rounded-pill shadow-lg px-5 py-3 fw-bold">
            <i class="bi bi-eye me-2"></i>Lihat Menu Kami
          </a>
          <a href="#featured-menu" class="btn btn-outline-light btn-xl rounded-pill px-5 py-3 fw-bold">
            <i class="bi bi-star me-2"></i>Menu Unggulan
          </a>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-5 mt-lg-0">
        <div class="hero-image-container animate__animated animate__fadeIn animate__delay-4s">
          <img src="<?= base_url('images/welcome.png') ?>" alt="Warung Makan Yokuwi" class="img-fluid hero-image">
          <div class="image-glow"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Statistics Section -->
<section class="stats-section py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-3 col-6 text-center">
        <div class="stat-card animate__animated animate__fadeInUp">
          <div class="stat-icon mb-3">
            <i class="bi bi-people text-danger"></i>
          </div>
          <h3 class="stat-number">1000+</h3>
          <p class="stat-label text-muted">Pelanggan Puas</p>
        </div>
      </div>
      <div class="col-md-3 col-6 text-center">
        <div class="stat-card animate__animated animate__fadeInUp animate__delay-1s">
          <div class="stat-icon mb-3">
            <i class="bi bi-cup-hot text-warning"></i>
          </div>
          <h3 class="stat-number">50+</h3>
          <p class="stat-label text-muted">Variasi Menu</p>
        </div>
      </div>
      <div class="col-md-3 col-6 text-center">
        <div class="stat-card animate__animated animate__fadeInUp animate__delay-2s">
          <div class="stat-icon mb-3">
            <i class="bi bi-clock text-success"></i>
          </div>
          <h3 class="stat-number">24/7</h3>
          <p class="stat-label text-muted">Layanan</p>
        </div>
      </div>
      <div class="col-md-3 col-6 text-center">
        <div class="stat-card animate__animated animate__fadeInUp animate__delay-3s">
          <div class="stat-icon mb-3">
            <i class="bi bi-star text-warning"></i>
          </div>
          <h3 class="stat-number">4.8</h3>
          <p class="stat-label text-muted">Rating</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Menu Section -->
<section id="featured-menu" class="featured-menu-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold text-danger animate__animated animate__fadeIn">Menu Unggulan Kami</h2>
      <p class="lead text-muted animate__animated animate__fadeIn animate__delay-1s">Pilih dari berbagai hidangan favorit pelanggan</p>
    </div>

    <div class="row g-4">
      <!-- Featured Item 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="featured-card animate__animated animate__fadeInUp">
          <div class="card-image">
            <img src="<?= base_url('images/nasi_ayam_gepuk.png') ?>" alt="Nasi Ayam Gepuk" class="img-fluid">
            <div class="card-overlay">
              <div class="overlay-content">
                <h5>Nasi Ayam Gepuk</h5>
                <p>Rp 25.000</p>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h5 class="card-title">Nasi Ayam Gepuk</h5>
            <p class="card-text">Ayam gepuk crispy dengan nasi putih dan sambal spesial</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price text-danger fw-bold">Rp 25.000</span>
              <a href="/menu" class="btn btn-danger btn-sm rounded-pill">Pesan</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Featured Item 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="featured-card animate__animated animate__fadeInUp animate__delay-1s">
          <div class="card-image">
            <img src="<?= base_url('images/nasi_ayam_goreng_kremes.png') ?>" alt="Nasi Ayam Goreng Kremes" class="img-fluid">
            <div class="card-overlay">
              <div class="overlay-content">
                <h5>Nasi Ayam Goreng Kremes</h5>
                <p>Rp 28.000</p>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h5 class="card-title">Nasi Ayam Goreng Kremes</h5>
            <p class="card-text">Ayam goreng dengan kremes renyah dan sambal terasi</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price text-danger fw-bold">Rp 28.000</span>
              <a href="/menu" class="btn btn-danger btn-sm rounded-pill">Pesan</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Featured Item 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="featured-card animate__animated animate__fadeInUp animate__delay-2s">
          <div class="card-image">
            <img src="<?= base_url('images/es_teh.png') ?>" alt="Es Teh Manis" class="img-fluid">
            <div class="card-overlay">
              <div class="overlay-content">
                <h5>Es Teh Manis</h5>
                <p>Rp 5.000</p>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h5 class="card-title">Es Teh Manis</h5>
            <p class="card-text">Teh segar dengan gula aren yang menyegarkan</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price text-danger fw-bold">Rp 5.000</span>
              <a href="/menu" class="btn btn-danger btn-sm rounded-pill">Pesan</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5">
      <a href="/menu" class="btn btn-danger btn-xl rounded-pill px-5 py-3 fw-bold animate__animated animate__pulse animate__infinite">
        <i class="bi bi-arrow-right me-2"></i>Lihat Semua Menu
      </a>
    </div>
  </div>
</section>

<!-- About Section Enhanced -->
<section class="about-section py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="about-image-container animate__animated animate__fadeInLeft">
          <img src="<?= base_url('images/warung.png') ?>" alt="Warung Makan Yokuwi" class="img-fluid rounded-4 shadow-lg">
          <div class="image-decoration">
            <div class="decoration-circle"></div>
            <div class="decoration-square"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="display-4 fw-bold text-danger mb-4 animate__animated animate__fadeInRight">Tentang Yokuwi</h2>
        <p class="lead text-muted mb-4 animate__animated animate__fadeInRight animate__delay-1s">
          Warung Makan <strong>Yokuwi</strong> hadir untuk membawa suasana makan seperti di rumah sendiri. Kami menyajikan berbagai hidangan khas nusantara dengan bahan segar, cita rasa otentik, dan harga bersahabat.
        </p>
        <div class="features-grid animate__animated animate__fadeInRight animate__delay-2s">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="bi bi-check-circle text-success"></i>
            </div>
            <div class="feature-content">
              <h6>Masakan Rumahan Autentik</h6>
              <p>Cita rasa seperti di rumah sendiri</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-icon">
              <i class="bi bi-check-circle text-success"></i>
            </div>
            <div class="feature-content">
              <h6>Bahan Segar Harian</h6>
              <p>Komitmen kualitas dan kesegaran</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-icon">
              <i class="bi bi-check-circle text-success"></i>
            </div>
            <div class="feature-content">
              <h6>Harga Terjangkau</h6>
              <p>Makanan lezat untuk semua kalangan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold text-danger animate__animated animate__fadeIn">Apa Kata Pelanggan</h2>
      <p class="lead text-muted animate__animated animate__fadeIn animate__delay-1s">Pengalaman mereka bersama Yokuwi</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4">
        <div class="testimonial-card animate__animated animate__fadeInUp">
          <div class="testimonial-content">
            <div class="stars mb-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="testimonial-text">"Makanan di Yokuwi sangat enak dan harganya terjangkau. Pelayanannya juga ramah sekali!"</p>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="author-info">
              <h6>Sari Dewi</h6>
              <span class="text-muted">Mahasiswa</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-1s">
          <div class="testimonial-content">
            <div class="stars mb-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="testimonial-text">"Ayam gepuknya juara! Rasanya autentik seperti masakan rumah. Bakal sering kesini lagi."</p>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="author-info">
              <h6>Budi Santoso</h6>
              <span class="text-muted">Karyawan Swasta</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-2s">
          <div class="testimonial-content">
            <div class="stars mb-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="testimonial-text">"Tempatnya bersih dan nyaman. Cocok untuk makan keluarga. Anak-anak juga suka!"</p>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="author-info">
              <h6>Rina Kartika</h6>
              <span class="text-muted">Ibu Rumah Tangga</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section Enhanced -->
<section class="cta-section text-center py-5 position-relative overflow-hidden">
  <div class="cta-bg-gradient"></div>
  <div class="container position-relative">
    <h3 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeIn">Siap Menikmati Makanan Lezat Hari Ini?</h3>
    <p class="lead text-light mb-5 fs-4 animate__animated animate__fadeIn animate__delay-1s">Datang langsung ke Warung Makan Yokuwi atau pesan sekarang juga!</p>
    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center animate__animated animate__fadeIn animate__delay-2s">
      <a href="/menu" class="btn btn-light btn-xl rounded-pill shadow-lg px-5 py-3 fw-bold">
        <i class="bi bi-cart-plus me-2"></i>Pesan Sekarang
      </a>
      <a href="#contact" class="btn btn-outline-light btn-xl rounded-pill px-5 py-3 fw-bold">
        <i class="bi bi-telephone me-2"></i>Hubungi Kami
      </a>
    </div>
  </div>
</section>

<!-- Custom Styles -->
<style>
/* Hero Section Enhancements */
.hero-section {
  background: linear-gradient(135deg, #c82333 0%, #dc3545 50%, #e74c3c 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
}

.hero-bg-gradient::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
              radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.floating-shapes .shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255,255,255,0.1);
  animation: float 6s ease-in-out infinite;
}

.shape-1 {
  width: 80px;
  height: 80px;
  top: 10%;
  left: 10%;
  animation-delay: 0s;
}

.shape-2 {
  width: 60px;
  height: 60px;
  top: 60%;
  right: 15%;
  animation-delay: 2s;
}

.shape-3 {
  width: 100px;
  height: 100px;
  bottom: 20%;
  left: 20%;
  animation-delay: 4s;
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.btn-xl {
  font-size: 1.2rem;
  padding: 1rem 2rem;
}

.hero-image-container {
  position: relative;
  display: inline-block;
}

.hero-image {
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
  max-width: 500px;
  width: 100%;
}

.image-glow {
  position: absolute;
  top: -10px;
  left: -10px;
  right: -10px;
  bottom: -10px;
  background: linear-gradient(45deg, rgba(255,255,255,0.2), rgba(255,215,0,0.2));
  border-radius: 30px;
  z-index: -1;
  filter: blur(20px);
}

/* Statistics Section */
.stats-section {
  background: linear-gradient(135deg, #fff5f5 0%, #fefefe 100%);
}

.stat-card {
  padding: 2rem 1rem;
  background: white;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(220, 53, 69, 0.1);
  transition: transform 0.3s ease;
}

.stat-card:hover {
  transform: translateY(-10px);
}

.stat-icon {
  font-size: 3rem;
  color: #dc3545;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 800;
  color: #dc3545;
  margin-bottom: 0.5rem;
}

.stat-label {
  font-weight: 600;
  margin-bottom: 0;
}

/* Featured Menu Section */
.featured-menu-section {
  background: #fff;
}

.featured-card {
  background: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 15px 35px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  margin-bottom: 2rem;
}

.featured-card:hover {
  transform: translateY(-15px);
  box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.card-image {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.featured-card:hover .card-image img {
  transform: scale(1.1);
}

.card-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(220, 53, 69, 0.8), rgba(231, 76, 60, 0.6));
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.featured-card:hover .card-overlay {
  opacity: 1;
}

.overlay-content {
  text-align: center;
  color: white;
}

.overlay-content h5 {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.overlay-content p {
  font-size: 1.2rem;
  font-weight: 600;
}

.card-content {
  padding: 1.5rem;
}

.card-title {
  font-size: 1.3rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 0.5rem;
}

.card-text {
  color: #6c757d;
  margin-bottom: 1rem;
  font-size: 0.95rem;
}

.price {
  font-size: 1.2rem;
}

/* About Section Enhancements */
.about-image-container {
  position: relative;
}

.about-image-container img {
  border-radius: 20px;
}

.image-decoration .decoration-circle {
  position: absolute;
  width: 80px;
  height: 80px;
  border: 4px solid #dc3545;
  border-radius: 50%;
  top: -20px;
  right: -20px;
  background: rgba(220, 53, 69, 0.1);
}

.image-decoration .decoration-square {
  position: absolute;
  width: 60px;
  height: 60px;
  background: linear-gradient(45deg, #f39c12, #e67e22);
  bottom: -20px;
  left: -20px;
  transform: rotate(45deg);
}

.features-grid {
  display: grid;
  gap: 1.5rem;
}

.feature-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
}

.feature-icon {
  font-size: 1.5rem;
  flex-shrink: 0;
  margin-top: 0.25rem;
}

.feature-content h6 {
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 0.25rem;
}

.feature-content p {
  color: #6c757d;
  font-size: 0.9rem;
  margin-bottom: 0;
}

/* Testimonials Section */
.testimonials-section {
  background: linear-gradient(135deg, #fff5f5 0%, #fefefe 100%);
}

.testimonial-card {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 15px 35px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
  margin-bottom: 2rem;
}

.testimonial-card:hover {
  transform: translateY(-10px);
}

.testimonial-content {
  margin-bottom: 1.5rem;
}

.testimonial-text {
  font-style: italic;
  color: #495057;
  font-size: 1rem;
  line-height: 1.6;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.author-avatar {
  font-size: 2.5rem;
  color: #dc3545;
}

.author-info h6 {
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 0.25rem;
}

.author-info span {
  color: #6c757d;
  font-size: 0.9rem;
}

/* CTA Section Enhancements */
.cta-section {
  background: linear-gradient(135deg, #c82333 0%, #dc3545 50%, #e74c3c 100%);
  position: relative;
}

.cta-bg-gradient::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 30% 70%, rgba(255,255,255,0.1) 0%, transparent 50%),
              radial-gradient(circle at 70% 30%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-section {
    min-height: 80vh;
    text-align: center;
  }

  .display-2 {
    font-size: 2.5rem;
  }

  .display-4 {
    font-size: 2rem;
  }

  .btn-xl {
    font-size: 1rem;
    padding: 0.8rem 1.5rem;
  }

  .hero-image {
    max-width: 300px;
  }

  .stat-card {
    margin-bottom: 2rem;
  }

  .featured-card {
    margin-bottom: 2rem;
  }

  .testimonial-card {
    margin-bottom: 2rem;
  }

  .features-grid {
    grid-template-columns: 1fr;
  }

  .feature-item {
    flex-direction: column;
    text-align: center;
  }
}
</style>

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<?= $this->endSection() ?>
