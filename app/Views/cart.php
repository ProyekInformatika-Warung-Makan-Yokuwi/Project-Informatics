<?php $this->setVar('title', 'Keranjang Belanja - Warung Makan Yokuwi'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<!-- Hero Section Cart -->
<section class="cart-hero-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeIn">🛒 Keranjang Belanja</h1>
        <p class="lead text-light mb-4 animate__animated animate__fadeIn animate__delay-1s">
          Tinjau pesanan Anda sebelum melanjutkan ke pembayaran
        </p>
        <?php if (!empty($cart)): ?>
          <div class="cart-stats animate__animated animate__fadeIn animate__delay-2s">
            <div class="d-flex justify-content-center justify-content-lg-start gap-4">
              <div class="stat-item text-center">
                <div class="stat-number text-warning fw-bold fs-3"><?= count($cart) ?></div>
                <div class="stat-label text-light">Item</div>
              </div>
              <div class="stat-item text-center">
                <div class="stat-number text-warning fw-bold fs-3">
                  <?php
                    $totalQty = 0;
                    foreach ($cart as $item) {
                      $totalQty += $item['qty'];
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
        <div class="hero-cart-image animate__animated animate__fadeIn animate__delay-3s">
          <img src="<?= base_url('images/gambar_tambahan_keranjang.png') ?>" alt="Keranjang Yokuwi" class="img-fluid rounded-4 shadow-lg">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Cart Items Section -->
<section class="cart-items-section py-5">
  <div class="container">
    <?php if (!empty($cart)): ?>
      <form action="<?= site_url('cart/checkout') ?>" method="post" id="cartForm">

        <!-- Cart Items -->
        <div class="row g-4 mb-5">
          <?php foreach ($cart as $item): ?>
            <div class="col-12">
              <div class="cart-item-card animate__animated animate__fadeInUp">
                <div class="row align-items-center g-3">
                  <!-- Checkbox -->
                  <div class="col-auto">
                    <div class="form-check">
                      <input type="checkbox" name="selected[]" value="<?= $item['id'] ?>" class="form-check-input cart-checkbox" id="item-<?= $item['id'] ?>">
                      <input type="hidden" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>" id="qty-hidden-<?= $item['id'] ?>">
                      <label class="form-check-label" for="item-<?= $item['id'] ?>"></label>
                    </div>
                  </div>

                  <!-- Image -->
                  <div class="col-auto">
                    <div class="cart-item-image">
                      <img src="<?= base_url('images/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="img-fluid rounded-3">
                    </div>
                  </div>

                  <!-- Item Details -->
                  <div class="col">
                    <div class="cart-item-details">
                      <h5 class="cart-item-title fw-bold text-dark mb-1" style="color: var(--text-primary) !important;"><?= esc($item['nama']) ?></h5>
                      <p class="cart-item-price text-danger fw-semibold mb-2" style="color: var(--primary-color) !important;">Rp <span class="harga"><?= number_format($item['harga'], 0, ',', '.') ?></span></p>
                      <div class="cart-item-category">
                        <span class="badge bg-success rounded-pill">
                          <i class="bi bi-check-circle me-1"></i>Makanan
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Quantity Controls -->
                  <div class="col-auto">
                    <div class="quantity-controls">
                      <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 minus-btn" data-id="<?= $item['id'] ?>">
                          <i class="bi bi-dash"></i>
                        </button>
                        <input type="text" class="form-control text-center mx-3 qty-input" value="<?= $item['qty'] ?>" style="width: 60px;" readonly data-id="<?= $item['id'] ?>">
                        <button type="button" class="btn btn-outline-success btn-sm rounded-pill px-3 plus-btn" data-id="<?= $item['id'] ?>">
                          <i class="bi bi-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Subtotal -->
                  <div class="col-auto">
                    <div class="cart-item-subtotal">
                      <p class="fw-bold text-danger mb-0 fs-5">Rp <span class="subtotal"><?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?></span></p>
                    </div>
                  </div>

                  <!-- Remove Button -->
                  <div class="col-auto">
                    <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill remove-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                      <i class="bi bi-trash"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Cart Summary & Actions -->
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="cart-summary-card animate__animated animate__fadeInUp">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="summary-stats">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <span class="text-muted">Total Item:</span>
                      <span class="fw-semibold" id="total-items"><?= count($cart) ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="text-muted">Total Quantity:</span>
                      <span class="fw-semibold" id="total-quantity">
                        <?php
                          $totalQty = 0;
                          foreach ($cart as $item) {
                            $totalQty += $item['qty'];
                          }
                          echo $totalQty;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 text-end">
                  <div class="cart-total">
                    <p class="text-muted mb-1">Total Pembayaran</p>
                    <h3 class="text-danger fw-bold mb-0" id="cart-total">
                      Rp <?php
                        $total = 0;
                        foreach ($cart as $item) {
                          $total += $item['harga'] * $item['qty'];
                        }
                        echo number_format($total, 0, ',', '.');
                      ?>
                    </h3>
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <div class="cart-actions text-center">
                <a href="/menu" class="btn btn-outline-danger btn-lg rounded-pill me-3 px-4 py-2 fw-semibold">
                  <i class="bi bi-arrow-left me-2"></i>Lanjut Belanja
                </a>
                <button type="submit" class="btn btn-danger btn-lg rounded-pill px-5 py-2 fw-semibold" id="checkout-btn" disabled>
                  <i class="bi bi-credit-card me-2"></i>Checkout yang Dipilih
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <?php else: ?>
      <!-- Empty Cart -->
      <div class="empty-cart text-center animate__animated animate__fadeIn">
        <div class="empty-cart-icon mb-4">
          <i class="bi bi-cart-x display-1 text-muted"></i>
        </div>
        <h3 class="text-muted mb-3">Keranjang Masih Kosong</h3>
        <p class="text-muted mb-4">Belum ada item yang ditambahkan ke keranjang belanja Anda</p>
        <a href="/menu" class="btn btn-danger btn-xl rounded-pill px-5 py-3 fw-semibold">
          <i class="bi bi-shop me-2"></i>Lihat Menu Sekarang
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Custom Styles -->
<style>
/* Cart Hero Section */
.cart-hero-section {
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
}

.cart-hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
              radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.cart-stats {
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

.hero-cart-image img {
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
  max-width: 500px;
  width: 100%;
}

/* Cart Item Cards */
.cart-item-card {
  background: white;
  border-radius: 20px;
  padding: 1.5rem;
  box-shadow: 0 10px 30px rgba(220, 53, 69, 0.1);
  transition: all 0.3s ease;
  border: 1px solid rgba(220, 53, 69, 0.05);
}

.cart-item-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(220, 53, 69, 0.15);
}

.cart-item-image {
  width: 80px;
  height: 80px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.cart-item-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.cart-item-title {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.cart-item-price {
  font-size: 1.1rem;
}

.quantity-controls .btn {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  font-weight: bold;
}

.quantity-controls .qty-input {
  border-radius: 8px;
  border: 2px solid #dee2e6;
  font-weight: 600;
  text-align: center;
}

.remove-btn {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.remove-btn:hover {
  background-color: #dc3545;
  border-color: #dc3545;
  color: white;
  transform: scale(1.1);
}

/* Cart Summary */
.cart-summary-card {
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

.cart-total {
  padding: 1rem;
  background: linear-gradient(135deg, #fff5f5, #fef2f2);
  border-radius: 12px;
  border: 2px solid rgba(220, 53, 69, 0.1);
}

.btn-xl {
  font-size: 1.2rem;
  padding: 1rem 2rem;
}

/* Empty Cart */
.empty-cart {
  padding: 4rem 2rem;
}

.empty-cart-icon {
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
  .cart-hero-section {
    text-align: center;
  }

  .cart-stats {
    margin-top: 2rem;
  }

  .cart-stats .d-flex {
    flex-direction: column;
    gap: 1rem;
  }

  .cart-item-card .row {
    text-align: center;
  }

  .cart-item-details {
    margin-top: 1rem;
  }

  .quantity-controls {
    justify-content: center;
    margin-top: 1rem;
  }

  .cart-item-subtotal {
    margin-top: 1rem;
  }

  .cart-actions .btn {
    width: 100%;
    margin-bottom: 0.5rem;
  }

  .cart-actions .btn:last-child {
    margin-bottom: 0;
  }
}

@media (max-width: 576px) {
  .display-4 {
    font-size: 2rem;
  }

  .cart-item-image {
    width: 60px;
    height: 60px;
  }

  .cart-item-title {
    font-size: 1rem;
  }

  .cart-item-price {
    font-size: 1rem;
  }
}

/* Dark Mode Styles for Cart Page */
[data-theme="dark"] .cart-hero-section {
  background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
}

[data-theme="dark"] .cart-hero-section::before {
  background: radial-gradient(circle at 20% 80%, rgba(231, 76, 60, 0.05) 0%, transparent 50%),
              radial-gradient(circle at 80% 20%, rgba(243, 156, 18, 0.05) 0%, transparent 50%);
}

[data-theme="dark"] .cart-stats {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.8)) !important;
  border: 1px solid rgba(231, 76, 60, 0.2) !important;
  backdrop-filter: blur(10px);
}

[data-theme="dark"] .stat-item .stat-number {
  color: var(--accent-color) !important;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

[data-theme="dark"] .stat-item .stat-label {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .hero-cart-image img {
  border-color: rgba(231, 76, 60, 0.3) !important;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(231, 76, 60, 0.1);
}

[data-theme="dark"] .cart-items-section {
  background: linear-gradient(135deg, var(--light-bg) 0%, rgba(25, 25, 25, 0.8) 100%);
}

[data-theme="dark"] .cart-item-card {
  background: var(--card-bg) !important;
  border: 1px solid rgba(231, 76, 60, 0.15) !important;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3) !important;
}

[data-theme="dark"] .cart-item-card:hover {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4), 0 0 25px rgba(231, 76, 60, 0.1) !important;
}

[data-theme="dark"] .cart-item-image {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4) !important;
}

[data-theme="dark"] .quantity-controls .qty-input {
  background: var(--input-bg) !important;
  border-color: var(--input-border) !important;
  color: var(--text-primary) !important;
}

[data-theme="dark"] .cart-summary-card {
  background: var(--card-bg) !important;
  border: 1px solid rgba(231, 76, 60, 0.15) !important;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3) !important;
}

[data-theme="dark"] .summary-stats {
  background: linear-gradient(135deg, var(--card-bg), rgba(40, 40, 40, 0.9)) !important;
  border: 1px solid rgba(231, 76, 60, 0.1) !important;
}

[data-theme="dark"] .cart-total {
  background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.9)) !important;
  border: 2px solid rgba(231, 76, 60, 0.2) !important;
}

[data-theme="dark"] .text-muted {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .empty-cart h3,
[data-theme="dark"] .empty-cart p {
  color: var(--text-secondary) !important;
}

[data-theme="dark"] .empty-cart-icon {
  color: var(--text-muted) !important;
  opacity: 0.3;
}

/* Enhanced Dark Mode Button Styles */
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

[data-theme="dark"] .btn-danger {
  background: linear-gradient(135deg, var(--danger-color), var(--primary-dark));
  border: 2px solid var(--danger-color);
  box-shadow: 0 4px 12px rgba(231, 76, 60, 0.2);
  transition: all 0.3s ease;
}

[data-theme="dark"] .btn-danger:hover {
  background: linear-gradient(135deg, var(--primary-dark), var(--danger-color));
  border-color: var(--primary-dark);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
}

/* Dark Mode Form Elements */
[data-theme="dark"] .form-check-input {
  background: var(--input-bg) !important;
  border-color: var(--input-border) !important;
}

[data-theme="dark"] .form-check-input:checked {
  background-color: var(--primary-color) !important;
  border-color: var(--primary-color) !important;
}

/* Dark Mode Badge Styles */
[data-theme="dark"] .badge {
  background: linear-gradient(135deg, var(--success-color), rgba(39, 174, 96, 0.8)) !important;
  box-shadow: 0 2px 6px rgba(39, 174, 96, 0.2);
}

/* Enhanced Dark Mode Hover Effects */
[data-theme="dark"] .cart-item-card:hover .cart-item-image {
  transform: scale(1.05);
  filter: brightness(1.1) contrast(1.1);
}

[data-theme="dark"] .btn-danger:hover,
[data-theme="dark"] .btn-outline-danger:hover {
  filter: drop-shadow(0 0 15px rgba(231, 76, 60, 0.4));
}

/* Better Dark Mode Text Readability */
[data-theme="dark"] .cart-item-title {
  color: var(--text-primary) !important;
}

[data-theme="dark"] .cart-item-price {
  color: var(--primary-color) !important;
}

[data-theme="dark"] .cart-total h3 {
  color: var(--primary-color) !important;
}

/* Dark Mode Responsive Adjustments */
@media (max-width: 768px) {
  [data-theme="dark"] .cart-hero-section {
    padding: 3rem 0;
  }

  [data-theme="dark"] .cart-stats {
    padding: 1rem;
  }
}

@media (max-width: 576px) {
  [data-theme="dark"] .display-4 {
    font-size: 2rem;
  }

  [data-theme="dark"] .cart-item-title {
    font-size: 1rem;
  }

  [data-theme="dark"] .cart-item-price {
    font-size: 1rem;
  }
}
</style>

<!-- Scripts -->
<script>
// Fungsi untuk format angka ke format rupiah
function formatRupiah(angka) {
  return new Intl.NumberFormat('id-ID', { style: 'decimal', maximumFractionDigits: 0 }).format(angka);
}

// Update checkout button state
function updateCheckoutButton() {
  const checkedBoxes = document.querySelectorAll('.cart-checkbox:checked');
  const checkoutBtn = document.getElementById('checkout-btn');
  checkoutBtn.disabled = checkedBoxes.length === 0;
}

// Update cart totals
function updateCartTotals() {
  let totalItems = 0;
  let totalQuantity = 0;
  let totalPrice = 0;

  document.querySelectorAll('.cart-item-card').forEach(card => {
    const checkbox = card.querySelector('.cart-checkbox');
    if (checkbox.checked) {
      const qty = parseInt(card.querySelector('.qty-input').value);
      const price = parseInt(card.querySelector('.harga').textContent.replace(/\./g, ''));

      totalItems++;
      totalQuantity += qty;
      totalPrice += price * qty;
    }
  });

  document.getElementById('total-items').textContent = totalItems;
  document.getElementById('total-quantity').textContent = totalQuantity;
  document.getElementById('cart-total').textContent = 'Rp ' + formatRupiah(totalPrice);
}

// Event listener untuk checkbox
document.addEventListener('DOMContentLoaded', function() {
  // Checkbox change events
  document.querySelectorAll('.cart-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
      updateCheckoutButton();
      updateCartTotals();
    });
  });

  // Quantity controls
  document.querySelectorAll('.plus-btn, .minus-btn').forEach(button => {
    button.addEventListener('click', function() {
      const itemId = this.dataset.id;
      const card = this.closest('.cart-item-card');
      const qtyInput = card.querySelector('.qty-input');
      const harga = parseInt(card.querySelector('.harga').textContent.replace(/\./g, ''));
      let qty = parseInt(qtyInput.value);

      if (this.classList.contains('plus-btn')) {
        qty++;
      } else if (this.classList.contains('minus-btn') && qty > 1) {
        qty--;
      }

      qtyInput.value = qty;
      // Update hidden input for form submission
      const hiddenQty = card.querySelector(`#qty-hidden-${itemId}`);
      if (hiddenQty) {
        hiddenQty.value = qty;
      }
      const subtotal = harga * qty;
      card.querySelector('.subtotal').textContent = formatRupiah(subtotal);

      // Update totals
      updateCartTotals();

      // Kirim update ke server tanpa reload
      fetch(`/cart/updateQtyAjax/${itemId}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ qty })
      }).catch(err => console.error(err));
    });
  });

  // Initial state
  updateCheckoutButton();
  updateCartTotals();
});
</script>

<?= $this->endSection() ?>
