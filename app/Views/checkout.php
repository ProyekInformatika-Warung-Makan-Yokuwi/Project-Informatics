<?php $this->setVar('title', 'Checkout - Warung Makan Yokuwi'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<?php
// Pastikan $items dan $total terdefinisi agar view tidak error
$items = $items ?? (isset($item) ? [$item] : []);
$total = $total ?? 0;
?>

<!-- Hero Section Checkout -->
<section class="checkout-hero-section py-5" style="background: linear-gradient(135deg, #c82333 0%, #dc3545 50%, #e74c3c 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeIn">💳 Checkout</h1>
        <p class="lead text-light mb-4 animate__animated animate__fadeIn animate__delay-1s">
          Konfirmasi pesanan Anda sebelum melanjutkan pembayaran
        </p>
        <?php if (!empty($items)): ?>
          <div class="checkout-stats animate__animated animate__fadeIn animate__delay-2s">
            <div class="d-flex justify-content-center justify-content-lg-start gap-4">
              <div class="stat-item text-center">
                <div class="stat-number text-warning fw-bold fs-3"><?= count($items) ?></div>
                <div class="stat-label text-light">Item</div>
              </div>
              <div class="stat-item text-center">
                <div class="stat-number text-warning fw-bold fs-3">
                  <?php
                    $totalQty = 0;
                    foreach ($items as $item) {
                      $totalQty += $item['qty'] ?? $item['quantity'] ?? 1;
                    }
                    echo $totalQty;
                  ?>
                </div>
                <div class="stat-label text-light">Jumlah</div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="hero-checkout-image animate__animated animate__fadeIn animate__delay-3s">
          <img src="<?= base_url('images/gambar_tambahan_checkout.png') ?>" alt="Checkout Yokuwi" class="img-fluid rounded-4 shadow-lg">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Checkout Items Section -->
<section class="checkout-items-section py-5" style="background: #fff5f5;">
  <div class="container">
    <?php if (!empty($items)): ?>

      <!-- Checkout Items -->
      <div class="row g-4 mb-5">
        <?php foreach ($items as $index => $it): ?>
          <?php
            $nama   = $it['nama'] ?? $it['namaMenu'] ?? '-';
            $harga  = $it['harga'] ?? $it['hargaMenu'] ?? 0;
            $qty    = $it['qty'] ?? $it['quantity'] ?? 1;
            $gambar = $it['gambar'] ?? ($it['image'] ?? 'default.jpg');
            $subtotal = (float)$harga * (int)$qty;
          ?>
          <div class="col-12">
            <div class="checkout-item-card animate__animated animate__fadeInUp" style="animation-delay: <?= $index * 0.1 ?>s;">
              <div class="row align-items-center g-3">

                <!-- Image -->
                <div class="col-auto">
                  <div class="checkout-item-image">
                    <img src="<?= base_url('images/' . esc($gambar)) ?>" alt="<?= esc($nama) ?>" class="img-fluid rounded-3">
                    <div class="quantity-badge">
                      <?= (int)$qty ?>
                    </div>
                  </div>
                </div>

                <!-- Item Details -->
                <div class="col">
                  <div class="checkout-item-details">
                    <h5 class="checkout-item-title fw-bold text-dark mb-1"><?= esc($nama) ?></h5>
                    <p class="checkout-item-price text-danger fw-semibold mb-2">Rp <span class="harga"><?= number_format($harga, 0, ',', '.') ?></span></p>
                    <div class="checkout-item-category">
                      <span class="badge bg-success rounded-pill">
                        <i class="bi bi-check-circle me-1"></i>Menu
                      </span>
                    </div>
                  </div>
                </div>

                <!-- Quantity Display -->
                <div class="col-auto">
                  <div class="quantity-display">
                    <div class="text-center">
                      <div class="quantity-number fw-bold fs-5 text-primary">x<?= (int)$qty ?></div>
                      <div class="quantity-label text-muted small">Qty</div>
                    </div>
                  </div>
                </div>

                <!-- Subtotal -->
                <div class="col-auto">
                  <div class="checkout-item-subtotal">
                    <p class="fw-bold text-danger mb-0 fs-5">Rp <span class="subtotal"><?= number_format($subtotal, 0, ',', '.') ?></span></p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Checkout Summary & Actions -->
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="checkout-summary-card animate__animated animate__fadeInUp">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="summary-stats">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Total Item:</span>
                    <span class="fw-semibold" id="total-items"><?= count($items) ?></span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Total Quantity:</span>
                    <span class="fw-semibold" id="total-quantity">
                      <?php
                        $totalQty = 0;
                        foreach ($items as $item) {
                          $totalQty += $item['qty'] ?? $item['quantity'] ?? 1;
                        }
                        echo $totalQty;
                      ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 text-end">
                <div class="checkout-total">
                  <p class="text-muted mb-1">Total Pembayaran</p>
                  <h3 class="text-danger fw-bold mb-0" id="checkout-total">
                    Rp <?= number_format((float)$total, 0, ',', '.') ?>
                  </h3>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <div class="checkout-actions text-center">
              <a href="/cart" class="btn btn-outline-danger btn-lg rounded-pill me-3 px-4 py-2 fw-semibold">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Keranjang
              </a>
              <a href="/order/payment" class="btn btn-danger btn-lg rounded-pill px-5 py-2 fw-semibold">
                <i class="bi bi-credit-card me-2"></i>Lanjut ke Pembayaran
              </a>
            </div>
          </div>
        </div>
      </div>

    <?php else: ?>
      <!-- Empty Checkout -->
      <div class="empty-checkout text-center animate__animated animate__fadeIn">
        <div class="empty-checkout-icon mb-4">
          <i class="bi bi-cart-x display-1 text-muted"></i>
        </div>
        <h3 class="text-muted mb-3">Tidak Ada Item untuk Checkout</h3>
        <p class="text-muted mb-4">Silakan tambahkan item ke keranjang terlebih dahulu</p>
        <a href="/menu" class="btn btn-danger btn-xl rounded-pill px-5 py-3 fw-semibold">
          <i class="bi bi-shop me-2"></i>Lihat Menu Sekarang
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Custom Styles -->
<style>
/* Checkout Hero Section */
.checkout-hero-section {
  position: relative;
  overflow: hidden;
}

.checkout-hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
              radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.checkout-stats {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  border-radius: 15px;
  padding: 1.5rem;
  border: 1px solid rgba(255,255,255,0.2);
}

.stat-item .stat-number {
  color: #ffd700;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.stat-item .stat-label {
  font-size: 0.9rem;
  opacity: 0.9;
}

.hero-checkout-image img {
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
  max-width: 500px;
  width: 100%;
}

/* Checkout Item Cards */
.checkout-item-card {
  background: white;
  border-radius: 20px;
  padding: 1.5rem;
  box-shadow: 0 10px 30px rgba(220, 53, 69, 0.1);
  transition: all 0.3s ease;
  border: 1px solid rgba(220, 53, 69, 0.05);
}

.checkout-item-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(220, 53, 69, 0.15);
}

.checkout-item-image {
  width: 80px;
  height: 80px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  position: relative;
}

.checkout-item-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.quantity-badge {
  position: absolute;
  top: -8px;
  right: -8px;
  background: linear-gradient(135deg, #e74c3c, #c0392b);
  color: white;
  border-radius: 50%;
  width: 28px;
  height: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 0.8rem;
  border: 2px solid white;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.checkout-item-title {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.checkout-item-price {
  font-size: 1.1rem;
}

.quantity-display {
  min-width: 60px;
}

.quantity-number {
  color: #007bff;
}

.quantity-label {
  font-size: 0.8rem;
}

/* Checkout Summary */
.checkout-summary-card {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 15px 35px rgba(0,0,0,0.1);
  border: 1px solid rgba(220, 53, 69, 0.05);
}

.summary-stats {
  padding: 1rem;
  background: #fff5f5;
  border-radius: 12px;
}

.checkout-total {
  padding: 1rem;
  background: linear-gradient(135deg, #fff5f5, #fef2f2);
  border-radius: 12px;
  border: 2px solid rgba(220, 53, 69, 0.1);
}

.btn-xl {
  font-size: 1.2rem;
  padding: 1rem 2rem;
}

/* Empty Checkout */
.empty-checkout {
  padding: 4rem 2rem;
}

.empty-checkout-icon {
  opacity: 0.5;
}

/* Animations */
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

/* Responsive Design */
@media (max-width: 768px) {
  .checkout-hero-section {
    text-align: center;
  }

  .checkout-stats {
    margin-top: 2rem;
  }

  .checkout-stats .d-flex {
    flex-direction: column;
    gap: 1rem;
  }

  .checkout-item-card .row {
    text-align: center;
  }

  .checkout-item-details {
    margin-top: 1rem;
  }

  .quantity-display {
    justify-content: center;
    margin-top: 1rem;
  }

  .checkout-item-subtotal {
    margin-top: 1rem;
  }

  .checkout-actions .btn {
    width: 100%;
    margin-bottom: 0.5rem;
  }

  .checkout-actions .btn:last-child {
    margin-bottom: 0;
  }
}

@media (max-width: 576px) {
  .display-4 {
    font-size: 2rem;
  }

  .checkout-item-image {
    width: 60px;
    height: 60px;
  }

  .checkout-item-title {
    font-size: 1rem;
  }

  .checkout-item-price {
    font-size: 1rem;
  }
}
</style>

<?= $this->endSection() ?>
