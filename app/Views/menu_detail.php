<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<?php
  $gambarPath = base_url('images/' . esc($menu['gambar']));
  $fullPath = FCPATH . 'images/' . $menu['gambar'];
  if (!file_exists($fullPath) || empty($menu['gambar'])) {
    $gambarPath = base_url('images/default.jpg');
  }

  // Determine category
  $menuName = strtolower($menu['namaMenu']);
  $isDrink = in_array($menuName, ['es jeruk', 'kopi hitam', 'es teh', 'air es', 'es susu coklat', 'air mineral']);
  $category = $isDrink ? 'Minuman' : 'Makanan';
  $categoryIcon = $isDrink ? 'bi-cup-straw' : 'bi-egg-fried';
  $categoryColor = $isDrink ? 'info' : 'success';
?>

<!-- Hero Section with Background Image -->
<section class="menu-detail-hero position-relative" style="background-image: linear-gradient(135deg, rgba(231, 76, 60, 0.9) 0%, rgba(220, 53, 69, 0.85) 25%, rgba(192, 57, 43, 0.95) 50%, rgba(155, 89, 182, 0.8) 75%, rgba(231, 76, 60, 0.9) 100%), url('<?= $gambarPath ?>'); background-size: cover; background-position: center; min-height: 70vh; box-shadow: inset 0 0 150px rgba(231, 76, 60, 0.3), 0 0 50px rgba(231, 76, 60, 0.1);">
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.2) 50%, rgba(231, 76, 60, 0.1) 100%);"></div>

  <div class="container position-relative h-100 d-flex align-items-center">
    <div class="row w-100 align-items-center">
      <div class="col-lg-8 text-white">
        <div class="hero-content animate__animated animate__fadeInLeft">
          <!-- Category Badge -->
          <div class="category-badge-hero mb-3">
            <span class="badge bg-<?= $categoryColor ?> rounded-pill px-3 py-2 fs-6 fw-semibold">
              <i class="bi <?= $categoryIcon ?> me-2"></i>
              <?= $category ?>
            </span>
          </div>

          <!-- Menu Name -->
          <h1 class="display-4 fw-bold mb-3 text-shadow-lg"><?= esc($menu['namaMenu']) ?></h1>



          <!-- Price -->
          <div class="price-hero mb-4">
            <span class="h2 fw-bold text-white">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></span>
          </div>

          <!-- Hero Description -->
          <div class="hero-description mb-4">
            <p class="lead text-white-50 mb-0" style="font-size: 1.1rem; line-height: 1.6;">
              Nikmati cita rasa autentik dari warung makan Yokuwi yang telah diwariskan turun-temurun.
              Dibuat dengan bahan-bahan pilihan dan resep rahasia yang tak tergantikan.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 text-center d-none d-lg-block">
        <div class="hero-image-wrapper animate__animated animate__fadeInRight">
          <div class="hero-floating-image rounded-4 overflow-hidden shadow-xl" style="background: white; padding: 1rem; transform: rotate(-5deg);">
            <img src="<?= $gambarPath ?>" alt="<?= esc($menu['namaMenu']) ?>" class="img-fluid rounded-3" style="max-height: 300px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Particle Effects -->
  <div class="particles">
    <div class="particle particle-1"></div>
    <div class="particle particle-2"></div>
    <div class="particle particle-3"></div>
    <div class="particle particle-4"></div>
    <div class="particle particle-5"></div>
  </div>
</section>

<!-- Menu Details Section -->
<section class="menu-details-section py-5 bg-light">
  <div class="container">
    <div class="row g-5">
      <!-- Main Content -->
      <div class="col-lg-8">
        <div class="menu-content-card card border-0 shadow-lg rounded-4 overflow-hidden">
          <div class="card-body p-5">
            <!-- Description -->
            <div class="description-section mb-5">
              <h3 class="h4 fw-bold text-dark mb-4">
                <i class="bi bi-card-text text-danger me-2"></i>Deskripsi Menu
              </h3>
              <p class="lead text-muted lh-lg">
                <?= esc($menu['namaMenu']) ?> adalah hidangan yang lezat dan autentik dari warung makan Yokuwi.
                Dibuat dengan bahan-bahan berkualitas tinggi dan resep tradisional yang telah diwariskan dari generasi ke generasi.
                Rasakan cita rasa yang kaya dan tekstur yang sempurna dalam setiap gigitannya.
              </p>
            </div>

            <!-- Ingredients -->
            <div class="ingredients-section mb-5">
              <h3 class="h4 fw-bold text-dark mb-4">
                <i class="bi bi-list-check text-danger me-2"></i>Bahan Utama
              </h3>
              <div class="row g-3">
                <?php
                $ingredients = $isDrink ?
                  ['Air mineral berkualitas', 'Gula alami', 'Es batu segar', 'Aroma alami'] :
                  ['Bahan protein pilihan', 'Sayuran segar', 'Bumbu rempah', 'Minyak goreng premium'];
                foreach($ingredients as $ingredient): ?>
                  <div class="col-md-6">
                    <div class="ingredient-item d-flex align-items-center p-3 bg-white rounded-3 shadow-sm">
                      <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                      <span class="fw-medium"><?= $ingredient ?></span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Nutritional Info -->
            <div class="nutrition-section mb-5">
            <h3 class="h4 fw-bold text-dark mb-4" style="color: var(--text-primary) !important;">
                <i class="bi bi-graph-up text-danger me-2" style="color: var(--primary-color) !important;"></i>Informasi Gizi
              </h3>
              <div class="nutrition-grid">
                <div class="row g-3">
                  <div class="col-6 col-md-3">
                    <div class="nutrition-item text-center p-3 bg-gradient-primary rounded-4 text-white">
                      <div class="nutrition-value fw-bold fs-4">350</div>
                      <div class="nutrition-label small">Kalori</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="nutrition-item text-center p-3 bg-gradient-success rounded-4 text-white">
                      <div class="nutrition-value fw-bold fs-4">25g</div>
                      <div class="nutrition-label small">Protein</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="nutrition-item text-center p-3 bg-gradient-warning rounded-4 text-white">
                      <div class="nutrition-value fw-bold fs-4">15g</div>
                      <div class="nutrition-label small">Lemak</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="nutrition-item text-center p-3 bg-gradient-info rounded-4 text-white">
                      <div class="nutrition-value fw-bold fs-4">45g</div>
                      <div class="nutrition-label small">Karbo</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <!-- Order Card -->
        <div class="order-card card border-0 shadow-lg rounded-4 overflow-hidden sticky-top" style="top: 100px;">
          <div class="card-header bg-gradient-danger text-white text-center py-4">
            <h4 class="mb-0 fw-bold">
              <i class="bi bi-cart-plus me-2"></i>Pesan Sekarang
            </h4>
          </div>
          <div class="card-body p-4">
            <!-- Price Display -->
            <div class="price-display text-center mb-4">
              <div class="current-price">
                <span class="h3 fw-bold text-danger">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></span>
              </div>
              <div class="original-price text-muted text-decoration-line-through">
                Rp <?= number_format($menu['hargaMenu'] * 1.2, 0, ',', '.') ?>
              </div>
              <div class="discount-badge">
                <span class="badge bg-success">Diskon 17%</span>
              </div>
            </div>

            <!-- Quantity Selector -->
            <div class="quantity-selector mb-4">
              <label class="form-label fw-semibold text-dark">Jumlah Pesanan</label>
              <div class="quantity-controls d-flex align-items-center justify-content-center">
                <button class="btn btn-outline-secondary rounded-circle quantity-btn" onclick="changeQuantity(-1)">
                  <i class="bi bi-dash"></i>
                </button>
                <input type="number" class="form-control text-center mx-3 quantity-input" id="quantity" value="1" min="1" max="10" readonly>
                <button class="btn btn-outline-secondary rounded-circle quantity-btn" onclick="changeQuantity(1)">
                  <i class="bi bi-plus"></i>
                </button>
              </div>
            </div>

            <!-- Total Price -->
            <div class="total-price mb-4 p-3 bg-light rounded-3 text-center">
              <div class="text-muted small mb-1">Total Pembayaran</div>
              <div class="h4 fw-bold text-danger" id="totalPrice">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons d-grid gap-3">
              <!-- Add to Cart -->
              <form action="/cart/add" method="post" class="add-to-cart-form">
                <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                <input type="hidden" name="quantity" id="cartQuantity" value="1">
                <button type="submit" class="btn btn-outline-danger btn-lg rounded-pill fw-semibold d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart-plus me-2"></i>
                  <span class="btn-text">Tambah ke Keranjang</span>
                  <div class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                </button>
              </form>

              <!-- Order Now -->
              <form action="/menu/orderNow" method="post" class="order-now-form">
                <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                <input type="hidden" name="quantity" id="orderQuantity" value="1">
                <button type="submit" class="btn btn-danger btn-lg rounded-pill fw-semibold d-flex align-items-center justify-content-center">
                  <i class="bi bi-lightning-charge me-2"></i>
                  <span class="btn-text">Pesan Sekarang</span>
                  <div class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                </button>
              </form>
            </div>

            <!-- Additional Info -->
            <div class="additional-info mt-4 pt-4 border-top">
              <div class="info-item d-flex align-items-center">
                <i class="bi bi-clock text-warning me-3 fs-5"></i>
                <div>
                  <div class="fw-semibold small">Estimasi Pesanan</div>
                  <div class="text-muted small">15-30 menit</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Back to Menu Link -->
<div class="container py-4">
  <div class="text-center">
    <a href="<?= site_url('menu') ?>" class="btn btn-outline-danger rounded-pill px-4 py-2 fw-semibold">
      <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Menu
    </a>
  </div>
</div>

<!-- Custom Styles -->
<style>
/* Hero Section */
.menu-detail-hero {
  position: relative;
  overflow: hidden;
}

.hero-overlay {
  z-index: 1;
}

.hero-content {
  z-index: 2;
}

.text-shadow-lg {
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.category-badge-hero .badge {
  font-size: 0.9rem;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.rating-stars .bi-star-fill {
  filter: drop-shadow(0 0 2px rgba(0,0,0,0.3));
}

.price-hero {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  border-radius: 15px;
  padding: 1rem;
  display: inline-block;
  border: 1px solid rgba(255,255,255,0.2);
}

.hero-actions .btn {
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.hero-actions .btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.hero-floating-image {
  animation: gentle-float 6s ease-in-out infinite;
}

@keyframes gentle-float {
  0%, 100% { transform: rotate(-5deg) translateY(0px); }
  50% { transform: rotate(-5deg) translateY(-10px); }
}

.floating-elements .floating-badge {
  z-index: 3;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}

/* Particle Effects */
.particles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 2;
}

.particle {
  position: absolute;
  background: rgba(231, 76, 60, 0.3);
  border-radius: 50%;
  animation: particle-float 8s ease-in-out infinite;
}

.particle-1 {
  width: 8px;
  height: 8px;
  top: 20%;
  left: 10%;
  animation-delay: 0s;
}

.particle-2 {
  width: 6px;
  height: 6px;
  top: 60%;
  left: 80%;
  animation-delay: 2s;
}

.particle-3 {
  width: 10px;
  height: 10px;
  top: 40%;
  left: 60%;
  animation-delay: 4s;
}

.particle-4 {
  width: 5px;
  height: 5px;
  top: 80%;
  left: 30%;
  animation-delay: 6s;
}

.particle-5 {
  width: 7px;
  height: 7px;
  top: 10%;
  left: 70%;
  animation-delay: 1s;
}

@keyframes particle-float {
  0%, 100% {
    transform: translateY(0px) translateX(0px);
    opacity: 0.3;
  }
  25% {
    transform: translateY(-20px) translateX(10px);
    opacity: 0.6;
  }
  50% {
    transform: translateY(-40px) translateX(-10px);
    opacity: 0.8;
  }
  75% {
    transform: translateY(-20px) translateX(5px);
    opacity: 0.5;
  }
}

/* Hero Description */
.hero-description {
  animation: fadeInUp 1s ease-out 0.5s both;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Menu Details */
.menu-content-card {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
  border: 1px solid rgba(231, 76, 60, 0.1);
}

.ingredients-section .ingredient-item {
  transition: all 0.3s ease;
  border-left: 4px solid var(--primary-color);
}

.ingredients-section .ingredient-item:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.nutrition-grid .nutrition-item {
  transition: all 0.3s ease;
}

.nutrition-grid .nutrition-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.bg-gradient-primary { background: linear-gradient(135deg, #007bff, #0056b3); }
.bg-gradient-success { background: linear-gradient(135deg, #28a745, #1e7e34); }
.bg-gradient-warning { background: linear-gradient(135deg, #ffc107, #e0a800); }
.bg-gradient-info { background: linear-gradient(135deg, #17a2b8, #138496); }
.bg-gradient-danger { background: linear-gradient(135deg, #dc3545, #c82333); }

.prep-item {
  transition: all 0.3s ease;
}

.prep-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* Order Card */
.order-card {
  background: white;
  border: 2px solid rgba(231, 76, 60, 0.1);
}

.order-card .card-header {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  border: none;
}

.price-display .current-price {
  background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(243, 156, 18, 0.1));
  border-radius: 10px;
  padding: 1rem;
  margin-bottom: 0.5rem;
}

.discount-badge {
  margin-top: 0.5rem;
}

.quantity-controls {
  background: #f8f9fa;
  border-radius: 25px;
  padding: 0.5rem;
  border: 1px solid #dee2e6;
}

.quantity-btn {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  transition: all 0.3s ease;
}

.quantity-btn:hover {
  background: var(--primary-color);
  color: white;
  transform: scale(1.1);
}

.quantity-input {
  width: 60px;
  border: none;
  background: transparent;
  text-align: center;
  font-weight: bold;
  font-size: 1.1rem;
}

.total-price {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  border: 1px solid rgba(231, 76, 60, 0.1);
}

.action-buttons .btn {
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.action-buttons .btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.5s;
}

.action-buttons .btn:hover::before {
  left: 100%;
}

.action-buttons .btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.additional-info .info-item {
  transition: all 0.3s ease;
}

.additional-info .info-item:hover {
  transform: translateX(5px);
}

/* Share Section */
.share-card {
  background: linear-gradient(135deg, #ffffff, #f8f9fa);
  border: 1px solid rgba(231, 76, 60, 0.1);
}

.share-buttons .share-btn {
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.share-buttons .share-btn:hover {
  transform: translateY(-3px) scale(1.1);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Related Items */
.related-item-card {
  transition: all 0.3s ease;
  border: 1px solid rgba(231, 76, 60, 0.1);
}

.related-item-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.related-item-card .card-img-top {
  transition: transform 0.3s ease;
}

.related-item-card:hover .card-img-top {
  transform: scale(1.05);
}

/* Toast Notifications */
.toast-notification {
  position: fixed;
  top: 100px;
  right: 30px;
  background: #28a745;
  color: white;
  padding: 15px 25px;
  border-radius: 10px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  z-index: 9999;
  opacity: 0;
  transform: translateX(100%);
  transition: all 0.3s ease;
  font-weight: 500;
}

.toast-notification.show {
  opacity: 1;
  transform: translateX(0);
}

.toast-notification.error {
  background: #dc3545;
}

/* Enhanced Dark Mode Styles for Menu Detail Page */
[data-theme="dark"] .menu-detail-hero {
  background: linear-gradient(135deg, rgba(15, 15, 15, 0.95) 0%, rgba(35, 35, 35, 0.95) 50%, rgba(20, 20, 20, 0.95) 100%);
  box-shadow: inset 0 0 100px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .hero-overlay {
  background: linear-gradient(45deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.4) 100%);
}

[data-theme="dark"] .hero-floating-image {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.8)) !important;
  border: 2px solid rgba(231, 76, 60, 0.3) !important;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), 0 0 20px rgba(231, 76, 60, 0.1);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

[data-theme="dark"] .hero-floating-image:hover {
  transform: rotate(-3deg) scale(1.02);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6), 0 0 30px rgba(231, 76, 60, 0.2);
}

[data-theme="dark"] .floating-badge .badge {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.9)) !important;
  color: var(--text-primary) !important;
  border: 1px solid rgba(231, 76, 60, 0.2) !important;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(10px);
}

[data-theme="dark"] .menu-details-section {
  background: linear-gradient(135deg, var(--light-bg) 0%, rgba(25, 25, 25, 0.8) 100%);
}

[data-theme="dark"] .menu-content-card {
  background: linear-gradient(135deg, var(--card-bg) 0%, rgba(40, 40, 40, 0.9) 100%);
  border: 1px solid rgba(231, 76, 60, 0.15);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(231, 76, 60, 0.05);
  color: var(--text-primary);
  transition: all 0.3s ease;
}

[data-theme="dark"] .menu-content-card:hover {
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4), 0 0 30px rgba(231, 76, 60, 0.1);
  transform: translateY(-2px);
}

[data-theme="dark"] .menu-content-card .card-body h3,
[data-theme="dark"] .menu-content-card .card-body h4 {
  color: var(--text-primary) !important;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

[data-theme="dark"] .menu-content-card .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .ingredients-section .ingredient-item {
  background: linear-gradient(135deg, var(--hover-bg), rgba(50, 50, 50, 0.8));
  border-left: 4px solid var(--primary-color);
  color: var(--text-primary);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

[data-theme="dark"] .ingredients-section .ingredient-item:hover {
  transform: translateX(8px) translateY(-2px);
  box-shadow: 0 8px 20px rgba(231, 76, 60, 0.15);
  border-left-color: var(--accent-color);
}

[data-theme="dark"] .ingredients-section .ingredient-item .text-success {
  color: var(--success-color) !important;
  filter: drop-shadow(0 0 4px rgba(39, 174, 96, 0.3));
}

[data-theme="dark"] .nutrition-item {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.9));
  color: var(--text-primary);
  border: 1px solid rgba(231, 76, 60, 0.1);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

[data-theme="dark"] .nutrition-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3), 0 0 15px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .nutrition-item .nutrition-label {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .prep-item {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.9));
  color: var(--text-primary);
  border: 1px solid rgba(231, 76, 60, 0.1);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

[data-theme="dark"] .prep-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3), 0 0 15px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .prep-item .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .prep-item .text-primary {
  color: var(--primary-color) !important;
  filter: drop-shadow(0 0 4px rgba(231, 76, 60, 0.3));
}

[data-theme="dark"] .prep-item .text-success {
  color: var(--success-color) !important;
  filter: drop-shadow(0 0 4px rgba(39, 174, 96, 0.3));
}

[data-theme="dark"] .prep-item .text-warning {
  color: var(--warning-color) !important;
  filter: drop-shadow(0 0 4px rgba(243, 156, 18, 0.3));
}

[data-theme="dark"] .order-card {
  background: linear-gradient(135deg, var(--card-bg) 0%, rgba(40, 40, 40, 0.9) 100%);
  border: 1px solid rgba(231, 76, 60, 0.2);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4), 0 0 25px rgba(231, 76, 60, 0.08);
  transition: all 0.3s ease;
}

[data-theme="dark"] .order-card:hover {
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5), 0 0 35px rgba(231, 76, 60, 0.12);
  transform: translateY(-3px);
}

[data-theme="dark"] .order-card .card-header {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
}

[data-theme="dark"] .order-card .card-body h4,
[data-theme="dark"] .order-card .card-body label,
[data-theme="dark"] .order-card .card-body .text-muted {
  color: var(--text-primary) !important;
}

[data-theme="dark"] .order-card .text-danger {
  color: var(--danger-color) !important;
  filter: drop-shadow(0 0 4px rgba(231, 76, 60, 0.3));
}

[data-theme="dark"] .order-card .text-success {
  color: var(--success-color) !important;
  filter: drop-shadow(0 0 4px rgba(39, 174, 96, 0.3));
}

[data-theme="dark"] .price-display {
  background: linear-gradient(135deg, rgba(231, 76, 60, 0.15), rgba(243, 156, 18, 0.1));
  border: 1px solid rgba(231, 76, 60, 0.2);
  box-shadow: 0 4px 12px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .quantity-controls {
  background: linear-gradient(135deg, var(--input-bg), rgba(35, 35, 35, 0.8));
  border: 1px solid var(--input-border);
  box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
}

[data-theme="dark"] .quantity-btn {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.9));
  border: 1px solid var(--border-color);
  color: var(--text-primary);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

[data-theme="dark"] .quantity-btn:hover {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
}

[data-theme="dark"] .quantity-input {
  background: transparent;
  color: var(--text-primary);
  border: none;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

[data-theme="dark"] .total-price {
  background: linear-gradient(135deg, var(--hover-bg), rgba(40, 40, 40, 0.9));
  border: 1px solid rgba(231, 76, 60, 0.25);
  box-shadow: 0 4px 12px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .total-price .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .action-buttons .btn-outline-danger {
  background: linear-gradient(135deg, transparent, rgba(231, 76, 60, 0.05));
  border: 2px solid var(--danger-color);
  color: var(--danger-color);
  box-shadow: 0 4px 12px rgba(231, 76, 60, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .action-buttons .btn-outline-danger:hover {
  background: linear-gradient(135deg, var(--danger-color), var(--primary-dark));
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
}

[data-theme="dark"] .action-buttons .btn-danger {
  background: linear-gradient(135deg, var(--danger-color), var(--primary-dark));
  border: 2px solid var(--danger-color);
  box-shadow: 0 4px 12px rgba(231, 76, 60, 0.2);
  transition: all 0.3s ease;
}

[data-theme="dark"] .action-buttons .btn-danger:hover {
  background: linear-gradient(135deg, var(--primary-dark), var(--danger-color));
  border-color: var(--primary-dark);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
}

[data-theme="dark"] .additional-info .info-item {
  color: var(--text-primary);
  background: linear-gradient(135deg, var(--hover-bg), rgba(45, 45, 45, 0.8));
  border-radius: 8px;
  padding: 0.75rem;
  transition: all 0.3s ease;
}

[data-theme="dark"] .additional-info .info-item:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

[data-theme="dark"] .additional-info .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .additional-info .text-success {
  color: var(--success-color) !important;
  filter: drop-shadow(0 0 4px rgba(39, 174, 96, 0.3));
}

[data-theme="dark"] .additional-info .text-primary {
  color: var(--primary-color) !important;
  filter: drop-shadow(0 0 4px rgba(231, 76, 60, 0.3));
}

[data-theme="dark"] .additional-info .text-warning {
  color: var(--warning-color) !important;
  filter: drop-shadow(0 0 4px rgba(243, 156, 18, 0.3));
}

[data-theme="dark"] .share-card {
  background: linear-gradient(135deg, var(--card-bg), rgba(40, 40, 40, 0.9));
  border: 1px solid rgba(231, 76, 60, 0.15);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

[data-theme="dark"] .share-card h5 {
  color: var(--text-primary) !important;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

[data-theme="dark"] .share-buttons .btn-outline-primary {
  background: linear-gradient(135deg, transparent, rgba(52, 152, 219, 0.05));
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  box-shadow: 0 2px 6px rgba(52, 152, 219, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .share-buttons .btn-outline-primary:hover {
  background: linear-gradient(135deg, var(--primary-color), var(--info-color));
  color: white;
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3);
}

[data-theme="dark"] .share-buttons .btn-outline-info {
  background: linear-gradient(135deg, transparent, rgba(52, 152, 219, 0.05));
  border: 2px solid var(--info-color);
  color: var(--info-color);
  box-shadow: 0 2px 6px rgba(52, 152, 219, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .share-buttons .btn-outline-info:hover {
  background: linear-gradient(135deg, var(--info-color), var(--primary-color));
  color: white;
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3);
}

[data-theme="dark"] .share-buttons .btn-outline-success {
  background: linear-gradient(135deg, transparent, rgba(39, 174, 96, 0.05));
  border: 2px solid var(--success-color);
  color: var(--success-color);
  box-shadow: 0 2px 6px rgba(39, 174, 96, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .share-buttons .btn-outline-success:hover {
  background: linear-gradient(135deg, var(--success-color), var(--primary-color));
  color: white;
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 15px rgba(39, 174, 96, 0.3);
}

[data-theme="dark"] .share-buttons .btn-outline-secondary {
  background: linear-gradient(135deg, transparent, rgba(108, 117, 125, 0.05));
  border: 2px solid var(--border-color);
  color: var(--text-primary);
  box-shadow: 0 2px 6px rgba(108, 117, 125, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .share-buttons .btn-outline-secondary:hover {
  background: linear-gradient(135deg, var(--border-color), rgba(108, 117, 125, 0.8));
  color: var(--text-primary);
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 15px rgba(108, 117, 125, 0.3);
}

[data-theme="dark"] .related-items-section {
  background: linear-gradient(135deg, var(--light-bg) 0%, rgba(25, 25, 25, 0.9) 100%);
}

[data-theme="dark"] .related-items-section h2 {
  color: var(--text-primary) !important;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

[data-theme="dark"] .related-items-section .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .related-item-card {
  background: linear-gradient(135deg, var(--card-bg), rgba(40, 40, 40, 0.9));
  border: 1px solid rgba(231, 76, 60, 0.15);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  transition: all 0.3s ease;
}

[data-theme="dark"] .related-item-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4), 0 0 25px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .related-item-card .card-title {
  color: var(--text-primary) !important;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

[data-theme="dark"] .related-item-card .card-text {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .related-item-card .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .related-item-card .badge {
  background: linear-gradient(135deg, var(--success-color), rgba(39, 174, 96, 0.8)) !important;
  box-shadow: 0 2px 6px rgba(39, 174, 96, 0.2);
}

[data-theme="dark"] .related-item-card .btn-outline-danger {
  background: linear-gradient(135deg, transparent, rgba(231, 76, 60, 0.05));
  border: 2px solid var(--danger-color);
  color: var(--danger-color);
  box-shadow: 0 2px 6px rgba(231, 76, 60, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .related-item-card .btn-outline-danger:hover {
  background: linear-gradient(135deg, var(--danger-color), var(--primary-dark));
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(231, 76, 60, 0.3);
}

[data-theme="dark"] .btn-outline-danger {
  background: linear-gradient(135deg, transparent, rgba(231, 76, 60, 0.05));
  border: 2px solid var(--danger-color);
  color: var(--danger-color);
  box-shadow: 0 2px 6px rgba(231, 76, 60, 0.1);
  transition: all 0.3s ease;
}

[data-theme="dark"] .btn-outline-danger:hover {
  background: linear-gradient(135deg, var(--danger-color), var(--primary-dark));
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(231, 76, 60, 0.3);
}

/* Dark Mode Toast */
[data-theme="dark"] .toast-notification {
  background: var(--card-bg);
  color: var(--text-primary);
  border: 1px solid var(--border-color);
  box-shadow: 0 5px 15px rgba(0,0,0,0.5);
}

[data-theme="dark"] .toast-notification.error {
  background: var(--danger-bg);
  color: var(--danger-color);
}

/* Responsive */
@media (max-width: 768px) {
  .menu-detail-hero {
    min-height: 50vh;
  }

  .hero-content {
    text-align: center;
  }

  .hero-actions {
    justify-content: center;
  }

  .floating-elements {
    display: none;
  }

  .quantity-controls {
    max-width: 200px;
    margin: 0 auto;
  }

  .share-buttons {
    flex-wrap: wrap;
  }

  .related-items-carousel .col-md-6 {
    margin-bottom: 1rem;
  }
}

@media (max-width: 576px) {
  .menu-content-card .card-body {
    padding: 2rem 1.5rem;
  }

  .order-card .card-body {
    padding: 2rem 1.5rem;
  }

  .hero-actions .btn {
    padding: 0.75rem 2rem;
    font-size: 0.9rem;
  }

  .nutrition-grid .col-6 {
    margin-bottom: 1rem;
  }
}
</style>

<!-- JavaScript -->
<script>
// Quantity selector functionality
function changeQuantity(delta) {
  const input = document.getElementById('quantity');
  const cartQuantity = document.getElementById('cartQuantity');
  const orderQuantity = document.getElementById('orderQuantity');
  const totalPrice = document.getElementById('totalPrice');

  let currentValue = parseInt(input.value);
  let newValue = currentValue + delta;

  if (newValue >= 1 && newValue <= 10) {
    input.value = newValue;
    cartQuantity.value = newValue;
    orderQuantity.value = newValue;

    // Update total price
    const basePrice = <?= $menu['hargaMenu'] ?>;
    const newTotal = basePrice * newValue;
    totalPrice.textContent = 'Rp ' + newTotal.toLocaleString('id-ID');
  }
}

// Scroll to details function
function scrollToDetails() {
  document.querySelector('.menu-details-section').scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
}

// Add to wishlist function
function addToWishlist() {
  showToast('Menu berhasil ditambahkan ke wishlist! ❤️', false);
}

// Share functions
function shareOnFacebook() {
  const url = window.location.href;
  window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
}

function shareOnTwitter() {
  const url = window.location.href;
  const text = 'Cek menu lezat ini di Yokuwi! 🍽️';
  window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`, '_blank');
}

function shareOnWhatsApp() {
  const url = window.location.href;
  const text = 'Cek menu lezat ini di Yokuwi! 🍽️ ' + url;
  window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
}

function copyLink() {
  navigator.clipboard.writeText(window.location.href).then(() => {
    showToast('Link berhasil disalin! 📋', false);
  });
}

// Toast notification function
function showToast(message, isError = false) {
  const toast = document.createElement('div');
  toast.className = `toast-notification ${isError ? 'error' : ''}`;
  toast.textContent = message;
  document.body.appendChild(toast);

  setTimeout(() => toast.classList.add('show'), 100);

  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// Add to cart form handling
document.addEventListener('DOMContentLoaded', function() {
  const addToCartForms = document.querySelectorAll('.add-to-cart-form');
  const orderNowForms = document.querySelectorAll('.order-now-form');

  // Handle add to cart
  addToCartForms.forEach(form => {
    form.addEventListener('submit', async function(e) {
      e.preventDefault();
      const button = form.querySelector('button');
      const spinner = button.querySelector('.spinner-border');
      const btnText = button.querySelector('.btn-text');

      // Show loading state
      btnText.textContent = 'Menambahkan...';
      spinner.classList.remove('d-none');

      try {
        const formData = new FormData(form);
        const response = await fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        const data = await response.json();

        if (data.success) {
          showToast('✅ Berhasil ditambahkan ke keranjang!');
          // Update cart count if available
          const cartBadge = document.querySelector('.cart-count-ultra');
          if (cartBadge && data.count) {
            cartBadge.textContent = data.count;
          }
        } else {
          showToast('❌ Gagal menambahkan ke keranjang.', true);
        }
      } catch (error) {
        console.error('Error:', error);
        showToast('❌ Terjadi kesalahan koneksi.', true);
      } finally {
        // Reset button state
        btnText.textContent = 'Tambah ke Keranjang';
        spinner.classList.add('d-none');
      }
    });
  });

  // Handle order now
  orderNowForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      const button = form.querySelector('button');
      const spinner = button.querySelector('.spinner-border');
      const btnText = button.querySelector('.btn-text');

      // Show loading state
      btnText.textContent = 'Memproses...';
      spinner.classList.remove('d-none');
      button.disabled = true;
    });
  });

  // Initialize quantity on page load
  changeQuantity(0);
});
</script>

<?= $this->endSection() ?>
