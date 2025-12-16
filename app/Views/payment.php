<?php $this->setVar('title', 'Pembayaran - Warung Makan Yokuwi'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<?php
// Pastikan $total terdefinisi
$total = $total ?? 0;
?>

<!-- Hero Section Payment -->
<section class="payment-hero-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeIn">💳 Pembayaran</h1>
        <p class="lead text-light mb-4 animate__animated animate__fadeIn animate__delay-1s">
          Pilih metode pembayaran yang sesuai untuk menyelesaikan pesanan Anda
        </p>
        <div class="payment-stats animate__animated animate__fadeIn animate__delay-2s">
          <div class="d-flex justify-content-center justify-content-lg-start gap-4">
            <div class="stat-item text-center">
              <div class="stat-number text-warning fw-bold fs-3">Rp <?= number_format($total, 0, ',', '.') ?></div>
              <div class="stat-label text-light">Total Bayar</div>
            </div>
            <div class="stat-item text-center">
              <div class="stat-number text-warning fw-bold fs-3">2</div>
              <div class="stat-label text-light">Metode</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="hero-payment-image animate__animated animate__fadeIn animate__delay-3s">
          <img src="<?= base_url('images/gambar_tambahan_pembayaran.png') ?>" alt="Pembayaran Yokuwi" class="img-fluid rounded-4 shadow-lg">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Payment Methods Section -->
  <div class="container">
    <form id="paymentForm" method="post" action="/order/confirmPayment">
      <?= csrf_field() ?>

      <!-- Customer Data Form (only for non-logged-in users) -->
      <?php if (!$isLoggedIn): ?>
      <div class="row g-4 mb-5 mt-4">
        <div class="col-12">
          <div class="customer-data-card animate__animated animate__fadeInUp">
            <div class="card-header-custom">
              <h5 class="card-title-custom">
                <i class="bi bi-person-fill me-2"></i>Data Pelanggan
              </h5>
              <p class="card-subtitle-custom">Silakan isi data diri Anda untuk melanjutkan pembayaran</p>
            </div>
            <div class="card-body-custom">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="namaPelanggan" class="form-label-custom">Nama Lengkap</label>
                  <input type="text" class="form-control-custom" id="namaPelanggan" name="namaPelanggan"
                         placeholder="Masukkan nama lengkap" required>
                  <div class="invalid-feedback">
                    Nama lengkap wajib diisi.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="nomorTelepon" class="form-label-custom">Nomor Telepon</label>
                  <input type="tel" class="form-control-custom" id="nomorTelepon" name="nomorTelepon"
                         placeholder="Contoh: 081234567890" pattern="[0-9]{10,13}" required>
                  <div class="invalid-feedback">
                    Nomor telepon harus berupa angka dan minimal 10 digit.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- Payment Methods -->
      <div class="row g-4 mb-5 mt-5">
        <!-- Tunai Payment Method -->
         <?php if ($isLoggedIn): ?>
        <div class="col-12">
          <div class="payment-method-card animate__animated animate__fadeInUp">
            <div class="row align-items-center g-3">

              <!-- Payment Icon -->
              <div class="col-auto">
                <div class="payment-method-image">
                  <div class="payment-icon-circle">
                    💵
                  </div>
                </div>
              </div>

              <!-- Payment Details -->
              <div class="col">
                <div class="payment-method-details">
                  <h5 class="payment-method-title fw-bold text-dark mb-1" style="color: var(--text-primary) !important;">Tunai</h5>
                  <p class="payment-method-desc text-muted mb-2" style="color: var(--text-secondary) !important;">Bayar langsung di kasir restoran</p>
                  <div class="payment-method-category">
                    <span class="badge bg-success rounded-pill">
                      <i class="bi bi-cash me-1"></i>Langsung
                    </span>
                  </div>
                </div>
              </div>

              <!-- Radio Button -->
              <div class="col-auto">
                <div class="payment-radio">
                  <input class="form-check-input payment-radio-input" type="radio" name="metode" id="tunai" value="tunai" checked>
                  <label class="form-check-label" for="tunai"></label>
                </div>
              </div>

            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- QRIS Payment Method -->
        <div class="col-12">
          <div class="payment-method-card animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
            <div class="row align-items-center g-3">

              <!-- Payment Icon -->
              <div class="col-auto">
                <div class="payment-method-image">
                  <div class="payment-icon-circle">
                    📱
                  </div>
                </div>
              </div>

              <!-- Payment Details -->
              <div class="col">
                <div class="payment-method-details">
                  <h5 class="payment-method-title fw-bold text-dark mb-1">QRIS</h5>
                  <p class="payment-method-desc text-muted mb-2">Transfer otomatis via e-wallet atau mobile banking</p>
                  <div class="payment-method-category">
                    <span class="badge bg-primary rounded-pill">
                      <i class="bi bi-qr-code me-1"></i>Digital
                    </span>
                  </div>
                </div>
              </div>

              <!-- Radio Button -->
              <div class="col-auto">
                <div class="payment-radio">
                  <input class="form-check-input payment-radio-input" type="radio" name="metode" id="qris" value="qris">
                  <label class="form-check-label" for="qris"></label>
                </div>
              </div>

            </div>

            <!-- QRIS Section (Hidden by default) -->
            <div id="qrisSection" class="qris-details mt-3 d-none">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="qris-info">
                    <h6 class="fw-bold text-primary mb-2" style="color: var(--info-color) !important;">Scan Kode QR</h6>
                    <p class="text-muted small mb-3" style="color: var(--text-secondary) !important;">Gunakan aplikasi e-wallet atau mobile banking untuk scan kode QR berikut:</p>
                    <div class="qris-features">
                      <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-check-circle text-success me-2"></i>
                        <small class="text-muted">Pembayaran otomatis terverifikasi</small>
                      </div>
                      <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-check-circle text-success me-2"></i>
                        <small class="text-muted">Transfer instan</small>
                      </div>
                      <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle text-success me-2"></i>
                        <small class="text-muted">Bebas biaya admin</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="qris-code-container">
                    <img src="<?= base_url('images/qris_example.png') ?>" alt="QRIS Code" class="img-fluid rounded-3 shadow qris-code">
                    <p class="text-success fw-semibold mt-2 mb-0">⚡ Scan untuk bayar</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Payment Summary & Actions -->
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="payment-summary-card animate__animated animate__fadeInUp">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="summary-stats">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Total Pembayaran:</span>
                    <span class="fw-semibold" id="total-payment">Rp <?= number_format($total, 0, ',', '.') ?></span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Metode:</span>
                    <span class="fw-semibold" id="selected-method">Tunai</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 text-end">
                <div class="payment-total">
                  <p class="text-muted mb-1">Total yang Dibayar</p>
                  <h3 class="text-danger fw-bold mb-0" id="final-total">
                    Rp <?= number_format($total, 0, ',', '.') ?>
                  </h3>
                  <small class="text-muted">Termasuk semua biaya</small>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <div class="payment-actions text-center">
              <button type="submit" class="btn btn-danger btn-lg rounded-pill px-5 py-2 fw-semibold me-3">
                <i class="bi bi-check-circle me-2"></i>Saya Sudah Bayar
              </button>
              <a href="/order/checkout" class="btn btn-outline-danger btn-lg rounded-pill px-4 py-2 fw-semibold">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Checkout
              </a>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
</section>

<!-- Custom Styles -->
<style>
/* Payment Hero Section */
.payment-hero-section {
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
}

/* Dark Mode Payment Hero Section */
[data-theme="dark"] .payment-hero-section {
  background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
}

.payment-hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
              radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.payment-stats {
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

.hero-payment-image img {
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
  max-width: 400px;
  width: 100%;
}

/* Payment Method Cards */
.payment-method-card {
  background: var(--card-bg);
  border-radius: 20px;
  padding: 1.5rem;
  box-shadow: var(--shadow-md);
  transition: all 0.3s ease;
  border: 1px solid var(--border-color);
  cursor: pointer;
}

.payment-method-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-lg);
}

.payment-method-card.selected {
  border-color: var(--primary-color);
  background: linear-gradient(135deg, rgba(231, 76, 60, 0.05), rgba(243, 156, 18, 0.05));
}

/* Dark Mode Payment Method Cards */
[data-theme="dark"] .payment-method-card {
  background: var(--card-bg);
  border-color: var(--border-color);
  box-shadow: var(--shadow-md);
}

[data-theme="dark"] .payment-method-card:hover {
  box-shadow: var(--shadow-lg);
}

[data-theme="dark"] .payment-method-card.selected {
  background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(243, 156, 18, 0.1));
}

.payment-method-image {
  width: 80px;
  height: 80px;
  border-radius: 12px;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.payment-icon-circle {
  width: 100%;
  height: 100%;
  border-radius: 12px;
  background: linear-gradient(135deg, #e74c3c, #c0392b);
  color: white;
  font-size: 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.payment-method-title {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.payment-method-desc {
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

.payment-radio {
  position: relative;
}

.payment-radio-input {
  width: 20px;
  height: 20px;
  margin: 0;
}

.payment-radio-input:checked {
  background-color: #dc3545;
  border-color: #dc3545;
}

/* QRIS Details */
.qris-details {
  background: var(--light-bg);
  border-radius: 15px;
  padding: 1.5rem;
  border: 1px solid var(--border-color);
}

/* Dark Mode QRIS Details */
[data-theme="dark"] .qris-details {
  background: var(--medium-gray);
  border-color: var(--border-color);
}

.qris-code-container {
  background: var(--card-bg);
  border-radius: 12px;
  padding: 1rem;
  box-shadow: var(--shadow-md);
}

/* Dark Mode QRIS Code Container */
[data-theme="dark"] .qris-code-container {
  background: var(--card-bg);
  box-shadow: var(--shadow-md);
}

.qris-code {
  max-width: 200px;
  width: 100%;
}

/* Customer Data Card */
.customer-data-card {
  background: var(--card-bg);
  border-radius: 20px;
  padding: 2rem;
  box-shadow: var(--shadow-md);
  border: 1px solid var(--border-color);
  transition: all 0.3s ease;
}

.customer-data-card:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

/* Dark Mode Customer Data Card */
[data-theme="dark"] .customer-data-card {
  background: var(--card-bg);
  border-color: var(--border-color);
  box-shadow: var(--shadow-md);
}

[data-theme="dark"] .customer-data-card:hover {
  box-shadow: var(--shadow-lg);
}

.card-header-custom {
  border-bottom: 2px solid rgba(220, 53, 69, 0.1);
  padding-bottom: 1rem;
  margin-bottom: 1.5rem;
}

.card-title-custom {
  color: #dc3545;
  font-size: 1.4rem;
  margin-bottom: 0.5rem;
}

.card-subtitle-custom {
  color: #6c757d;
  font-size: 0.95rem;
  margin-bottom: 0;
}

.card-body-custom {
  padding: 0;
}

.form-label-custom {
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}

/* Dark Mode Text Contrast for Customer Data Card */
[data-theme="dark"] .card-title-custom {
  color: #ff6b7d;
}

[data-theme="dark"] .card-subtitle-custom {
  color: #adb5bd;
}

[data-theme="dark"] .form-label-custom {
  color: #f8f9fa;
}

.form-control-custom {
  border: 2px solid #e9ecef;
  border-radius: 12px;
  padding: 0.75rem 1rem;
  font-size: 1rem;
  transition: all 0.3s ease;
  background: #f8f9fa;
}

.form-control-custom:focus {
  border-color: #dc3545;
  background: white;
  box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.form-control-custom:invalid {
  border-color: #dc3545;
}

/* Dark Mode Input Fields */
[data-theme="dark"] .form-control-custom {
  background: var(--medium-gray);
  border-color: var(--border-color);
  color: #f8f9fa;
}

[data-theme="dark"] .form-control-custom:focus {
  background: var(--medium-gray);
  color: #f8f9fa;
}

/* Payment Summary */
.payment-summary-card {
  background: var(--card-bg);
  border-radius: 20px;
  padding: 2rem;
  box-shadow: var(--shadow-lg);
  border: 1px solid var(--border-color);
}

/* Dark Mode Payment Summary */
[data-theme="dark"] .payment-summary-card {
  background: var(--card-bg);
  border-color: var(--border-color);
  box-shadow: var(--shadow-lg);
}

.summary-stats {
  padding: 1rem;
  background: var(--light-bg);
  border-radius: 12px;
}

/* Dark Mode Summary Stats */
[data-theme="dark"] .summary-stats {
  background: var(--medium-gray);
}

.payment-total {
  padding: 1rem;
  background: linear-gradient(135deg, rgba(231, 76, 60, 0.05), rgba(243, 156, 18, 0.05));
  border-radius: 12px;
  border: 2px solid rgba(231, 76, 60, 0.1);
}

/* Dark Mode Payment Total */
[data-theme="dark"] .payment-total {
  background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(243, 156, 18, 0.1));
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
  .payment-hero-section {
    text-align: center;
  }

  .payment-stats {
    margin-top: 2rem;
  }

  .payment-stats .d-flex {
    flex-direction: column;
    gap: 1rem;
  }

  .payment-method-card .row {
    text-align: center;
  }

  .payment-method-details {
    margin-top: 1rem;
  }

  .payment-radio {
    justify-content: center;
    margin-top: 1rem;
  }

  .qris-details .row {
    text-align: center;
  }

  .qris-info {
    margin-bottom: 2rem;
  }

  .payment-actions .btn {
    width: 100%;
    margin-bottom: 0.5rem;
  }

  .payment-actions .btn:last-child {
    margin-bottom: 0;
  }
}

@media (max-width: 576px) {
  .display-4 {
    font-size: 2rem;
  }

  .payment-method-image {
    width: 60px;
    height: 60px;
  }

  .payment-icon-circle {
    font-size: 1.5rem;
  }

  .payment-method-title {
    font-size: 1rem;
  }

  .payment-method-desc {
    font-size: 0.9rem;
  }
}
</style>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const paymentCards = document.querySelectorAll('.payment-method-card');
  const qrisSection = document.getElementById('qrisSection');
  const selectedMethodSpan = document.getElementById('selected-method');

  paymentCards.forEach(card => {
    card.addEventListener('click', function() {
      // Remove selected class from all cards
      paymentCards.forEach(c => c.classList.remove('selected'));

      // Add selected class to clicked card
      this.classList.add('selected');

      // Check the radio button
      const radio = this.querySelector('.payment-radio-input');
      radio.checked = true;

      // Update selected method display
      const methodName = this.querySelector('.payment-method-title').textContent;
      selectedMethodSpan.textContent = methodName;

      // Show/hide QRIS section
      if (radio.id === 'qris') {
        qrisSection.classList.remove('d-none');
        qrisSection.classList.add('animate__animated', 'animate__fadeIn');
      } else {
        qrisSection.classList.add('d-none');
        qrisSection.classList.remove('animate__animated', 'animate__fadeIn');
      }
    });
  });

  // Initialize with tunai selected
  const tunaiCard = document.querySelector('.payment-method-card');
  if (tunaiCard) {
    tunaiCard.classList.add('selected');
  }
});
</script>

<?= $this->endSection() ?>
