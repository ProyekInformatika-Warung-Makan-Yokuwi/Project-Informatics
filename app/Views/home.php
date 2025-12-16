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
          <a href="/menu" class="btn btn-light-theme btn-xl rounded-pill shadow-lg px-5 py-3 fw-bold">
            <i class="bi bi-eye me-2"></i>Lihat Menu Kami
          </a>
          <a href="#featured-menu" class="btn btn-outline-light-theme btn-xl rounded-pill px-5 py-3 fw-bold">
            <i class="bi bi-star me-2"></i>Menu Unggulan
          </a>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-5 mt-lg-0">
        <div class="hero-image-container animate__animated animate__fadeIn animate__delay-4s">
          <img src="<?= base_url('images/kelompok.jpg') ?>" alt="Warung Makan Yokuwi" class="img-fluid hero-image">
          <div class="image-glow"></div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Featured Menu Section - Enhanced Design -->
<section id="featured-menu" class="featured-menu-section py-5 position-relative">
  <!-- Background Pattern -->
  <div class="featured-bg-pattern"></div>

  <div class="container position-relative">
    <!-- Section Header -->
    <div class="text-center mb-5">
      <div class="section-badge mb-3">
        <span class="badge bg-danger rounded-pill px-4 py-2 fs-6 fw-semibold">
          <i class="bi bi-star-fill me-1"></i>Menu Unggulan
        </span>
      </div>
      <h2 class="display-4 fw-bold text-danger mb-3 animate__animated animate__fadeIn">
        Pilihan Terbaik Kami
      </h2>
      <p class="lead text-muted fs-5 animate__animated animate__fadeIn animate__delay-1s">
        Hidangan favorit pelanggan yang wajib dicoba
      </p>
    </div>

    <!-- Featured Cards Grid -->
    <div class="row g-4 justify-content-center">
      <!-- Featured Item 1 - Premium Card -->
      <div class="col-lg-4 col-md-6">
        <div class="featured-card premium-card animate__animated animate__fadeInUp">
          <!-- Premium Badge -->
          <div class="premium-badge">
            <i class="bi bi-crown-fill"></i>
          </div>

          <div class="card-image-wrapper">
            <div class="card-image">
              <img src="<?= base_url('images/nasi_ayam_gepuk.png') ?>" alt="Nasi Ayam Gepuk" class="img-fluid">
              <div class="image-gradient"></div>

              <!-- Floating Price Badge -->
              <div class="price-badge">
                <span class="price-amount">Rp 25.000</span>
              </div>
            </div>
          </div>

          <div class="card-content">
            <div class="menu-category">
              <span class="badge bg-success-subtle text-success rounded-pill">
                <i class="bi bi-egg-fried me-1"></i>Makanan Utama
              </span>
            </div>

            <h5 class="card-title fw-bold">Nasi Ayam Gepuk</h5>
            <p class="card-description">Ayam gepuk crispy dengan nasi putih hangat dan sambal spesial rumah</p>

            <div class="card-footer">
              <form action="/menu/orderNow" method="post" class="d-inline">
                <input type="hidden" name="idMenu" value="1"> <!-- Nasi Ayam Gepuk ID -->
                <button type="submit" class="btn btn-danger-modern btn-sm rounded-pill px-4 py-2 fw-semibold">
                  <i class="bi bi-cart-plus me-1"></i>Pesan Sekarang
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Featured Item 2 - Popular Card -->
      <div class="col-lg-4 col-md-6">
        <div class="featured-card popular-card animate__animated animate__fadeInUp animate__delay-1s">
          <!-- Popular Badge -->
          <div class="popular-badge">
            <i class="bi bi-fire"></i>
            <span>Terlaris</span>
          </div>

          <div class="card-image-wrapper">
            <div class="card-image">
              <img src="<?= base_url('images/nasi_ayam_goreng_kremes.png') ?>" alt="Nasi Ayam Goreng Kremes" class="img-fluid">
              <div class="image-gradient"></div>

              <!-- Floating Price Badge -->
              <div class="price-badge">
                <span class="price-amount">Rp 28.000</span>
              </div>
            </div>
          </div>

          <div class="card-content">
            <div class="menu-category">
              <span class="badge bg-warning-subtle text-warning rounded-pill">
                <i class="bi bi-star me-1"></i>Menu Favorit
              </span>
            </div>

            <h5 class="card-title fw-bold">Nasi Ayam Goreng Kremes</h5>
            <p class="card-description">Ayam goreng renyah dengan kremes gurih dan sambal terasi pedas</p>

            <div class="card-footer">
              <form action="/menu/orderNow" method="post" class="d-inline">
                <input type="hidden" name="idMenu" value="2"> <!-- Nasi Ayam Goreng Kremes ID -->
                <button type="submit" class="btn btn-danger-modern btn-sm rounded-pill px-4 py-2 fw-semibold">
                  <i class="bi bi-cart-plus me-1"></i>Pesan Sekarang
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Featured Item 3 - Drink Card -->
      <div class="col-lg-4 col-md-6">
        <div class="featured-card drink-card animate__animated animate__fadeInUp animate__delay-2s">
          <!-- Drink Badge -->
          <div class="drink-badge">
            <i class="bi bi-cup-straw"></i>
          </div>

          <div class="card-image-wrapper">
            <div class="card-image">
              <img src="<?= base_url('images/es_teh.png') ?>" alt="Es Teh Manis" class="img-fluid">
              <div class="image-gradient"></div>

              <!-- Floating Price Badge -->
              <div class="price-badge">
                <span class="price-amount">Rp 5.000</span>
              </div>
            </div>
          </div>

          <div class="card-content">
            <div class="menu-category">
              <span class="badge bg-info-subtle text-info rounded-pill">
                <i class="bi bi-cup-straw me-1"></i>Minuman Segar
              </span>
            </div>

            <h5 class="card-title fw-bold">Es Teh Manis</h5>
            <p class="card-description">Teh segar pilihan dengan gula aren yang menyegarkan dan nikmat</p>

            <div class="card-footer">
              <form action="/menu/orderNow" method="post" class="d-inline">
                <input type="hidden" name="idMenu" value="3"> <!-- Es Teh Manis ID -->
                <button type="submit" class="btn btn-info-modern btn-sm rounded-pill px-4 py-2 fw-semibold">
                  <i class="bi bi-cart-plus me-1"></i>Pesan Sekarang
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5">
      <div class="cta-container">
        <p class="text-muted mb-4 fs-6">Masih banyak menu lezat lainnya menunggu Anda!</p>
        <a href="/menu" class="btn btn-danger-modern btn-xl rounded-pill px-5 py-3 fw-bold shadow-lg animate__animated animate__pulse animate__infinite">
          <i class="bi bi-arrow-right-circle me-2 fs-5"></i>Lihat Semua Menu
          <i class="bi bi-arrow-right-circle ms-2 fs-5"></i>
        </a>
      </div>
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
            <p class="testimonial-text">"Sangat pantas dapat nilai 100..."</p>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="author-info">
              <h6>Ibu Polin</h6>
              <span class="text-muted">Dosen</span>
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
            <p class="testimonial-text">"Sangat setujuu bu..."</p>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="author-info">
              <h6>Asdos Cewek</h6>
              <span class="text-muted">Mahasiswa</span>
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
            <p class="testimonial-text">"Manut..."</p>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="author-info">
              <h6>Asdos Cowok</h6>
              <span class="text-muted">Mahasiswa</span>
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
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
}

/* Dark Mode Hero Section */
[data-theme="dark"] .hero-section {
  background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
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

/* Featured Menu Section - Enhanced */
.featured-menu-section {
  background: linear-gradient(135deg, var(--light-gray) 0%, var(--white) 50%, var(--light-gray) 100%);
  position: relative;
  overflow: hidden;
}

/* Dark Mode Featured Menu Section */
[data-theme="dark"] .featured-menu-section {
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--card-bg) 50%, var(--light-bg) 100%);
}

.featured-bg-pattern {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image:
    radial-gradient(circle at 25% 25%, rgba(220, 53, 69, 0.03) 0%, transparent 50%),
    radial-gradient(circle at 75% 75%, rgba(243, 156, 18, 0.03) 0%, transparent 50%);
  pointer-events: none;
}

.section-badge {
  display: inline-block;
  animation: badgePulse 2s ease-in-out infinite;
}

@keyframes badgePulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

.featured-card {
  background: white;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 8px 32px rgba(0,0,0,0.08);
  transition: all 0.15s ease;
  position: relative;
  border: 1px solid rgba(0,0,0,0.05);
  height: 100%;
}

.featured-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

/* Premium Card Special Styling */
.premium-card {
  background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
  border: 2px solid linear-gradient(135deg, #ffd700, #ffb347);
  position: relative;
}

.premium-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #ffd700, #ffb347, #ffd700);
  border-radius: 24px 24px 0 0;
}

.premium-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(135deg, #ffd700, #ffb347);
  color: #8b4513;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
  z-index: 10;
  animation: crownGlow 3s ease-in-out infinite;
}

@keyframes crownGlow {
  0%, 100% { box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3); }
  50% { box-shadow: 0 4px 20px rgba(255, 215, 0, 0.6); }
}

/* Popular Card Special Styling */
.popular-card {
  background: linear-gradient(135deg, #ffffff 0%, #fff5f5 100%);
  border: 2px solid linear-gradient(135deg, #ff6b6b, #ee5a52);
  position: relative;
}

.popular-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #ff6b6b, #ee5a52, #ff6b6b);
  border-radius: 24px 24px 0 0;
}

.popular-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(135deg, #ff6b6b, #ee5a52);
  color: white;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 4px;
  box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
  z-index: 10;
  animation: firePulse 2s ease-in-out infinite;
}

@keyframes firePulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

/* Drink Card Special Styling */
.drink-card {
  background: linear-gradient(135deg, #ffffff 0%, #f0f8ff 100%);
  border: 2px solid linear-gradient(135deg, #4fc3f7, #29b6f6);
  position: relative;
}

.drink-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #4fc3f7, #29b6f6, #4fc3f7);
  border-radius: 24px 24px 0 0;
}

.drink-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(135deg, #4fc3f7, #29b6f6);
  color: white;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  box-shadow: 0 4px 12px rgba(79, 195, 247, 0.3);
  z-index: 10;
  animation: drinkFloat 3s ease-in-out infinite;
}

@keyframes drinkFloat {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-3px) rotate(5deg); }
}

.card-image-wrapper {
  position: relative;
  height: 280px;
  overflow: hidden;
}

.card-image {
  position: relative;
  height: 100%;
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.15s ease;
}

.featured-card:hover .card-image img {
  transform: scale(1.08);
}

.image-gradient {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 60%;
  background: linear-gradient(transparent, rgba(0,0,0,0.1));
  pointer-events: none;
}

.price-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  color: #dc3545;
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 800;
  font-size: 0.9rem;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  border: 2px solid rgba(220, 53, 69, 0.1);
  z-index: 10;
}

.card-content {
  padding: 1.5rem;
}

.menu-category {
  margin-bottom: 0.75rem;
}

.card-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 0.5rem;
  line-height: 1.3;
}

.card-description {
  color: #6c757d;
  font-size: 0.9rem;
  line-height: 1.5;
  margin-bottom: 1rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1rem;
  border-top: 1px solid rgba(0,0,0,0.05);
}

.rating-stars {
  display: flex;
  align-items: center;
  gap: 2px;
  font-size: 0.85rem;
}

.btn-primary-modern {
  background: linear-gradient(135deg, #007bff, #0056b3);
  border: none;
  color: white;
  transition: all 0.15s ease;
}

.btn-primary-modern:hover {
  background: linear-gradient(135deg, #0056b3, #004085);
  transform: translateY(-2px);
  color: white;
}

.btn-success-modern {
  background: linear-gradient(135deg, #28a745, #1e7e34);
  border: none;
  color: white;
  transition: all 0.15s ease;
}

.btn-success-modern:hover {
  background: linear-gradient(135deg, #1e7e34, #155724);
  transform: translateY(-2px);
  color: white;
}

.btn-info-modern {
  background: linear-gradient(135deg, #17a2b8, #138496);
  border: none;
  color: white;
  transition: all 0.15s ease;
}

.btn-info-modern:hover {
  background: linear-gradient(135deg, #138496, #117a8b);
  transform: translateY(-2px);
  color: white;
}

.btn-danger-modern {
  background: linear-gradient(135deg, #dc3545, #c82333);
  border: none;
  color: white;
  transition: all 0.15s ease;
}

.btn-danger-modern:hover {
  background: linear-gradient(135deg, #c82333, #bd2130);
  transform: translateY(-2px);
  color: white;
}

.cta-container {
  background: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 2rem;
  border: 1px solid rgba(220, 53, 69, 0.1);
  display: inline-block;
}

/* About Section Enhancements */
.about-section {
  background: var(--light-bg) !important;
}

/* Dark Mode About Section */
[data-theme="dark"] .about-section {
  background: var(--light-bg) !important;
}

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
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
  position: relative;
}

/* Dark Mode CTA Section */
[data-theme="dark"] .cta-section {
  background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
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
