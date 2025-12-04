<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<section class="success-hero-section min-vh-100 py-5 position-relative overflow-hidden">
  <div class="success-bg-gradient"></div>
  <div class="floating-shapes">
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
  </div>
  <div class="container position-relative">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <!-- Success Header -->
        <div class="text-center mb-5 animate__animated animate__fadeIn">
          <div class="success-icon mb-4 animate__animated animate__bounceIn animate__delay-1s">
            <i class="fas fa-check-circle text-success" style="font-size: 120px; filter: drop-shadow(0 0 20px rgba(39, 174, 96, 0.3));"></i>
          </div>
          <h1 class="display-4 fw-bold text-white mb-3 animate__animated animate__fadeInUp animate__delay-2s">Pesanan Berhasil!</h1>
          <p class="lead text-light animate__animated animate__fadeInUp animate__delay-3s">
            Terima kasih telah memesan di <strong class="text-warning">Yokuwi</strong>!<br>
            <span class="text-light">Pesanan Anda sedang diproses dengan penuh perhatian</span>
          </p>
        </div>

        <div class="row">
          <!-- Order Details Card -->
          <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100 order-details-card">
              <div class="card-header border-0 py-3">
                <h5 class="mb-0 fw-semibold text-dark" style="color: var(--text-primary) !important;">
                  <i class="fas fa-receipt me-2 text-primary" style="color: var(--info-color) !important;"></i>Detail Pesanan
                </h5>
              </div>
              <div class="card-body">
                <!-- Customer Info -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-user text-muted me-2"></i>
                      <span class="fw-medium">Nama:</span>
                    </div>
                    <p class="text-dark mb-0 ms-3"><?= esc($namaPelanggan ?? 'N/A') ?></p>
                  </div>
                  <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-phone text-muted me-2"></i>
                      <span class="fw-medium">Telepon:</span>
                    </div>
                    <p class="text-dark mb-0 ms-3"><?= esc($nomorTelepon ?? 'N/A') ?></p>
                  </div>
                </div>

                <!-- Order Info -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="bg-light p-3 rounded-3 text-center">
                      <div class="text-muted small mb-1">ID Pesanan</div>
                      <div class="fw-bold text-primary">#<?= esc($order_id ?? 'N/A') ?></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="bg-light p-3 rounded-3 text-center">
                      <div class="text-muted small mb-1">Estimasi Masak</div>
                      <div class="fw-bold text-info"><?= esc($estimasi_masak ?? '15-20 menit') ?></div>
                    </div>
                  </div>
                </div>

                <!-- Order Items -->
                <div class="mb-4">
                  <h6 class="fw-semibold mb-3">Item Pesanan</h6>
                  <div class="table-responsive">
                    <table class="table table-borderless order-items-table">
                      <thead class="table-light">
                        <tr>
                          <th class="border-0">Menu</th>
                          <th class="border-0 text-center">Qty</th>
                          <th class="border-0 text-end">Harga</th>
                          <th class="border-0 text-end">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($order_items)): ?>
                          <?php foreach ($order_items as $item): ?>
                            <tr>
                              <td class="border-0">
                                <div class="fw-medium"><?= esc($item['namaMenu']) ?></div>
                              </td>
                              <td class="border-0 text-center fw-medium"><?= esc($item['jumlah']) ?>x</td>
                              <td class="border-0 text-end">Rp <?= number_format($item['hargaTransaksi'], 0, ',', '.') ?></td>
                              <td class="border-0 text-end fw-medium">Rp <?= number_format($item['subTotal'], 0, ',', '.') ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="4" class="border-0 text-center text-muted">Tidak ada item pesanan</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                      <tfoot class="table-light">
                        <tr>
                          <th colspan="3" class="border-0 text-end">Total Pembayaran</th>
                          <th class="border-0 text-end fw-bold text-primary">Rp <?= number_format($total ?? 0, 0, ',', '.') ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <!-- Payment Info -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-credit-card text-muted me-2"></i>
                      <span class="fw-medium">Metode Pembayaran:</span>
                    </div>
                    <p class="text-dark mb-0 ms-3"><?= esc($metode ?? 'N/A') ?></p>
                  </div>
                  <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-info-circle text-muted me-2"></i>
                      <span class="fw-medium">Status:</span>
                    </div>
                    <p class="text-dark mb-0 ms-3"><?= esc($status ?? 'N/A') ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Progress & Actions Card (updated with icons and style) -->
          <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4 process-card p-4">
              <h5 class="process-title text-center mb-4">Proses Pesanan</h5>
              <div class="steps-container d-flex flex-column">
                <div class="step <?= ($current_step ?? 1) >= 1 ? 'active' : '' ?>">
                  <div class="step-number">1</div>
                  <div class="step-content">
                    <div class="step-title fw-bold">
                      Pesanan Dikonfirmasi
                    </div>
                    <div class="step-desc">
                      Pesanan telah diterima sistem
                    </div>
                  </div>
                </div>
                <div class="step <?= ($current_step ?? 1) >= 2 ? 'active' : '' ?>">
                  <div class="step-number">2</div>
                  <div class="step-content">
                    <div class="step-title">Sedang Dipersiapkan</div>
                    <div class="step-desc">Bahan sedang disiapkan</div>
                  </div>
                </div>
                <div class="step <?= ($current_step ?? 1) >= 3 ? 'active' : '' ?>">
                  <div class="step-number">3</div>
                  <div class="step-content">
                    <div class="step-title">Siap Diambil</div>
                    <div class="step-desc">Pesanan siap diambil</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="card border-0 shadow-sm action-buttons-card">
              <div class="card-body">
                <a href="/order/downloadNota/<?= esc($order_id) ?>" class="btn btn-primary w-100 mb-3 fw-semibold" target="_blank">
                  <i class="fas fa-download me-2"></i>Unduh Nota Pesanan (PDF)
                </a>
                <a href="/menu" class="btn btn-outline-danger w-100 fw-semibold">
                  <i class="fas fa-arrow-left me-2"></i>Kembali ke Menu
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<style>
  /* Success Hero Section Enhancements */
  .success-hero-section {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
  }

  /* Dark Mode Success Hero Section */
  [data-theme="dark"] .success-hero-section {
    background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
  }

  .success-bg-gradient::before {
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

  /* Success Icon */
  .success-icon {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
  }

  /* Order Details Card - Enhanced */
  .order-details-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }

  .order-details-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 60px rgba(0,0,0,0.15);
  }

  /* Dark Mode Order Details Card */
  [data-theme="dark"] .order-details-card {
    background: rgba(45, 45, 45, 0.95);
    border-color: rgba(64, 64, 64, 0.3);
    color: var(--text-primary);
  }

  /* Process Card - Enhanced */
  .process-card {
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
  }

  .process-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
  }

  /* Dark Mode Process Card */
  [data-theme="dark"] .process-card {
    background: rgba(45, 45, 45, 0.9);
    border-color: rgba(64, 64, 64, 0.3);
  }

  .process-title {
    color: var(--text-primary);
    font-weight: 700;
    font-size: 1.25rem;
  }

  /* Dark Mode Process Title */
  [data-theme="dark"] .process-title {
    color: var(--text-primary);
  }

  .steps-container {
    gap: 1.5rem;
  }

  .step {
    display: flex;
    align-items: flex-start;
    padding: 1rem;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    margin-bottom: 0.5rem;
    backdrop-filter: blur(5px);
  }

  .step:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  .step.active {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border-color: #22c55e;
    box-shadow: 0 4px 20px rgba(34, 197, 94, 0.15);
  }

  /* Dark Mode Steps */
  [data-theme="dark"] .step {
    background: rgba(64, 64, 64, 0.8);
    border-color: rgba(128, 128, 128, 0.2);
  }

  [data-theme="dark"] .step.active {
    background: linear-gradient(135deg, rgba(26, 77, 58, 0.8) 0%, rgba(220, 252, 231, 0.2) 100%);
    border-color: #22c55e;
  }

  .step-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    margin-right: 1rem;
    flex-shrink: 0;
    transition: all 0.3s ease;
  }

  .step.active .step-number {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
  }

  /* Dark Mode Step Number */
  [data-theme="dark"] .step-number {
    background: linear-gradient(135deg, #404040 0%, #2d2d2d 100%);
    color: #b0b0b0;
  }

  .step-content {
    flex: 1;
  }

  .step-title {
    font-size: 1rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.25rem;
    line-height: 1.3;
  }

  .step-desc {
    font-size: 0.85rem;
    color: #6b7280;
    line-height: 1.4;
  }

  .step.active .step-title,
  .step.active .step-desc {
    color: #22c55e !important;
  }

  /* Dark Mode Step Text */
  [data-theme="dark"] .step-title {
    color: var(--text-primary);
  }

  [data-theme="dark"] .step-desc {
    color: var(--text-secondary);
  }

  /* Action Buttons Card - Enhanced */
  .action-buttons-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }

  .action-buttons-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
  }

  /* Dark Mode Action Buttons Card */
  [data-theme="dark"] .action-buttons-card {
    background: rgba(45, 45, 45, 0.95);
    border-color: rgba(64, 64, 64, 0.3);
  }

  /* Enhanced Button Styles */
  .btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
    color: white;
  }

  .btn-outline-danger {
    background: transparent;
    color: var(--danger-color);
    border: 2px solid var(--danger-color);
    transition: all 0.3s ease;
  }

  .btn-outline-danger:hover {
    background: var(--danger-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
  }

  /* Dark Mode Buttons */
  [data-theme="dark"] .btn-outline-danger {
    color: #ef4444;
    border-color: #ef4444;
  }

  [data-theme="dark"] .btn-outline-danger:hover {
    background: #ef4444;
    color: white;
  }

  /* Info Boxes Enhancement */
  .bg-light {
    background: rgba(255, 255, 255, 0.8) !important;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
  }

  /* Dark Mode Info Boxes */
  [data-theme="dark"] .bg-light {
    background: rgba(64, 64, 64, 0.8) !important;
    border-color: rgba(128, 128, 128, 0.3);
  }

  /* Table Enhancement */
  .table-light {
    background: rgba(248, 249, 250, 0.8) !important;
    backdrop-filter: blur(5px);
  }

  /* Dark Mode Table */
  [data-theme="dark"] .table-light {
    background: rgba(0, 0, 0, 0.9) !important;
  }

  /* Dark Mode Table in Order Items */
  [data-theme="dark"] .table-responsive .table {
    background: rgba(0, 0, 0, 0.9) !important;
  }

  /* Dark Mode Order Items Table */
  [data-theme="dark"] .order-items-table {
    background: rgba(0, 0, 0, 0.9) !important;
  }

  [data-theme="dark"] .order-items-table thead,
  [data-theme="dark"] .order-items-table tfoot {
    background: rgba(0, 0, 0, 0.9) !important;
  }

  /* Dark Mode Table Body */
  [data-theme="dark"] .table {
    background: rgba(0, 0, 0, 0.9) !important;
    color: var(--text-primary) !important;
  }

  [data-theme="dark"] .table tbody tr {
    background: rgba(0, 0, 0, 0.9) !important;
    border-color: rgba(64, 64, 64, 0.3) !important;
  }

  [data-theme="dark"] .table tbody tr:hover {
    background: rgba(32, 32, 32, 0.9) !important;
  }

  /* Text Colors Enhancement */
  .text-dark {
    color: var(--text-primary) !important;
  }

  .text-muted {
    color: var(--text-secondary) !important;
  }

  /* Dark Mode Text Colors */
  [data-theme="dark"] .text-dark {
    color: var(--text-primary) !important;
  }

  [data-theme="dark"] .text-muted {
    color: var(--text-secondary) !important;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .success-hero-section {
      min-height: 80vh;
      text-align: center;
    }

    .display-4 {
      font-size: 2.5rem;
    }

    .step {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .step-number {
      margin-right: 0;
      margin-bottom: 0.5rem;
    }

    .floating-shapes .shape {
      display: none; /* Hide floating shapes on mobile for better performance */
    }
  }

  @media (max-width: 576px) {
    .success-hero-section {
      padding: 2rem 0;
    }

    .display-4 {
      font-size: 2rem;
    }

    .lead {
      font-size: 1rem;
    }
  }
</style>

<script>
  // No longer needed since we display the actual order time
</script>

<?= $this->endSection() ?>
