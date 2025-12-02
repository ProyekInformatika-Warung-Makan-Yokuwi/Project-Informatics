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
<section class="menu-detail-hero position-relative" style="background-image: linear-gradient(135deg, rgba(231, 76, 60, 0.9) 0%, rgba(220, 53, 69, 0.9) 100%), url('<?= $gambarPath ?>'); background-size: cover; background-position: center; min-height: 60vh;">
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);"></div>

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

          <!-- Rating Stars -->
          <div class="rating-stars mb-3">
            <div class="d-flex align-items-center">
              <?php for($i = 1; $i <= 5; $i++): ?>
                <i class="bi bi-star-fill text-warning me-1"></i>
              <?php endfor; ?>
              <span class="ms-2 text-light">(4.8/5.0)</span>
            </div>
          </div>

          <!-- Price -->
          <div class="price-hero mb-4">
            <span class="h2 fw-bold text-white">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></span>
          </div>

          <!-- Quick Actions -->
          <div class="hero-actions d-flex gap-3 flex-wrap">
            <button class="btn btn-light btn-lg rounded-pill px-4 py-3 fw-semibold shadow-lg" onclick="scrollToDetails()">
              <i class="bi bi-info-circle me-2"></i>Lihat Detail
            </button>
            <button class="btn btn-outline-light btn-lg rounded-pill px-4 py-3 fw-semibold" onclick="addToWishlist()">
              <i class="bi bi-heart me-2"></i>Simpan
            </button>
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

  <!-- Floating Elements -->
  <div class="floating-elements">
    <div class="floating-badge position-absolute" style="top: 20%; right: 10%; animation: float 3s ease-in-out infinite;">
      <div class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-semibold">
        <i class="bi bi-fire me-1"></i>Terlaris
      </div>
    </div>
    <div class="floating-badge position-absolute" style="bottom: 25%; left: 5%; animation: float 4s ease-in-out infinite;">
      <div class="badge bg-success rounded-pill px-3 py-2 fw-semibold">
        <i class="bi bi-check-circle me-1"></i>Halal
      </div>
    </div>
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
              <h3 class="h4 fw-bold text-dark mb-4">
                <i class="bi bi-graph-up text-danger me-2"></i>Informasi Gizi
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

            <!-- Preparation Info -->
            <div class="preparation-section">
              <h3 class="h4 fw-bold text-dark mb-4">
                <i class="bi bi-clock text-danger me-2"></i>Informasi Penyajian
              </h3>
              <div class="row g-4">
                <div class="col-md-4">
                  <div class="prep-item text-center p-4 bg-white rounded-4 shadow-sm">
                    <i class="bi bi-clock-history text-primary fs-1 mb-3"></i>
                    <div class="fw-bold fs-5 text-dark">15-20</div>
                    <div class="text-muted">Menit</div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="prep-item text-center p-4 bg-white rounded-4 shadow-sm">
                    <i class="bi bi-people text-success fs-1 mb-3"></i>
                    <div class="fw-bold fs-5 text-dark">1-2</div>
                    <div class="text-muted">Porsi</div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="prep-item text-center p-4 bg-white rounded-4 shadow-sm">
                    <i class="bi bi-thermometer-half text-warning fs-1 mb-3"></i>
                    <div class="fw-bold fs-5 text-dark">Panas</div>
                    <div class="text-muted">Sajian</div>
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
              <div class="info-item d-flex align-items-center mb-3">
                <i class="bi bi-truck text-success me-3 fs-5"></i>
                <div>
                  <div class="fw-semibold small">Gratis Ongkir</div>
                  <div class="text-muted small">Minimal pesanan Rp 50.000</div>
                </div>
              </div>
              <div class="info-item d-flex align-items-center mb-3">
                <i class="bi bi-shield-check text-primary me-3 fs-5"></i>
                <div>
                  <div class="fw-semibold small">Pembayaran Aman</div>
                  <div class="text-muted small">QRIS, Transfer, COD</div>
                </div>
              </div>
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

        <!-- Share Section -->
        <div class="share-card card border-0 shadow-lg rounded-4 overflow-hidden mt-4">
          <div class="card-body p-4 text-center">
            <h5 class="fw-bold text-dark mb-3">
              <i class="bi bi-share text-danger me-2"></i>Bagikan Menu
            </h5>
            <div class="share-buttons d-flex justify-content-center gap-2">
              <button class="btn btn-outline-primary rounded-circle share-btn" onclick="shareOnFacebook()">
                <i class="bi bi-facebook"></i>
              </button>
              <button class="btn btn-outline-info rounded-circle share-btn" onclick="shareOnTwitter()">
                <i class="bi bi-twitter"></i>
              </button>
              <button class="btn btn-outline-success rounded-circle share-btn" onclick="shareOnWhatsApp()">
                <i class="bi bi-whatsapp"></i>
              </button>
              <button class="btn btn-outline-secondary rounded-circle share-btn" onclick="copyLink()">
                <i class="bi bi-link-45deg"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Related Items Section -->
<section class="related-items-section py-5 bg-white">
  <div class="container">
    <div class="section-header text-center mb-5">
      <h2 class="h3 fw-bold text-dark mb-3">
        <i class="bi bi-star text-warning me-2"></i>Menu Lainnya yang Mungkin Anda Suka
      </h2>
      <p class="text-muted">Temukan hidangan lezat lainnya dari koleksi kami</p>
    </div>

    <div class="related-items-carousel">
      <div class="row g-4">
        <!-- Sample related items - in real app, this would be dynamic -->
        <?php for($i = 1; $i <= 4; $i++): ?>
          <div class="col-md-6 col-lg-3">
            <div class="related-item-card card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="<?= base_url('images/nasi_ayam_gepuk.png') ?>" class="card-img-top" alt="Related Menu" style="height: 200px; object-fit: cover;">
                <div class="category-badge position-absolute top-0 end-0 m-2">
                  <span class="badge bg-success rounded-pill">
                    <i class="bi bi-egg-fried me-1"></i>Makanan
                  </span>
                </div>
              </div>
              <div class="card-body p-3">
                <h6 class="card-title fw-bold text-dark mb-2">Nasi Ayam Gepuk</h6>
                <p class="card-text text-danger fw-semibold mb-2">Rp 25.000</p>
                <button class="btn btn-outline-danger btn-sm rounded-pill w-100">
                  <i class="bi bi-eye me-1"></i>Lihat Detail
                </button>
              </div>
            </div>
          </div>
        <?php endfor; ?>
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
