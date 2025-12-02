<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<section class="min-vh-100 py-5" style="background: #ffffff;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <!-- Success Header -->
        <div class="text-center mb-5">
          <div class="success-icon mb-4">
            <i class="fas fa-star text-warning" style="font-size: 120px;"></i>
          </div>
          <h1 class="display-4 fw-bold text-success mb-3">Pesanan Berhasil!</h1>
          <p class="lead text-muted">
            Terima kasih telah memesan di <strong>Yokuwi</strong>!<br>
            Pesanan Anda sedang diproses
          </p>
        </div>

        <div class="row">
          <!-- Order Details Card -->
          <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100 order-details-card">
              <div class="card-header border-0 py-3">
                <h5 class="mb-0 fw-semibold text-dark">
                  <i class="fas fa-receipt me-2 text-primary"></i>Detail Pesanan
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
                    <table class="table table-borderless">
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
  /* Global Styles */
  body {
    background-color: #ffffff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Success Icon */
  .success-icon {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
  }

  /* Order Process Card */
  .process-card {
    border-radius: 20px;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid rgba(148, 163, 184, 0.2);
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

  /* Responsive Design */
  @media (max-width: 576px) {
    .step {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .step-number {
      margin-right: 0;
      margin-bottom: 0.5rem;
    }
  }
</style>

<script>
  // No longer needed since we display the actual order time
</script>

<?= $this->endSection() ?>
