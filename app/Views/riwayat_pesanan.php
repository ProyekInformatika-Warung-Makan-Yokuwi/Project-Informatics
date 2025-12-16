<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<style>
/* Enhanced Riwayat Pesanan Styles */
.riwayat-pesanan-container {
  padding: var(--spacing-3xl) 0;
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
  min-height: calc(100vh - 200px);
}

[data-theme="dark"] .riwayat-pesanan-container {
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
}

/* Modern Page Header */
.riwayat-pesanan-header {
  text-align: center;
  margin-bottom: var(--spacing-3xl);
  position: relative;
}

.riwayat-pesanan-title {
  font-family: var(--font-secondary);
  font-weight: 800;
  font-size: var(--font-size-4xl);
  color: var(--primary-color);
  margin-bottom: var(--spacing-lg);
  position: relative;
  display: inline-block;
}

.riwayat-pesanan-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
  border-radius: var(--radius-full);
}

.riwayat-pesanan-subtitle {
  font-size: var(--font-size-lg);
  color: var(--text-secondary);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

/* Download Button Section - NEW */
.riwayat-pesanan-download-section {
  display: flex;
  justify-content: flex-end;
  gap: var(--spacing-md);
  margin-bottom: var(--spacing-xl);
  flex-wrap: wrap;
}

.btn-download-pdf {
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-xs);
  padding: var(--spacing-sm) var(--spacing-lg);
  border-radius: var(--radius-lg);
  font-weight: 600;
  font-size: var(--font-size-base);
  transition: var(--transition-normal);
  border: none;
  cursor: pointer;
  text-decoration: none;
  box-shadow: var(--shadow-md);
}

.btn-download-pdf:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

.btn-download-primary {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
}

.btn-download-primary:hover {
  color: white;
}

.btn-download-success {
  background: linear-gradient(135deg, var(--success-color), #27ae60);
  color: white;
}

.btn-download-success:hover {
  color: white;
}

/* Enhanced Alert Styles */
.riwayat-pesanan-alert {
  border-radius: var(--radius-xl);
  border: none;
  box-shadow: var(--shadow-md);
  backdrop-filter: blur(10px);
  position: relative;
  overflow: hidden;
  padding: var(--spacing-xl);
  text-align: center;
}

.riwayat-pesanan-alert::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--info-color), var(--primary-color));
}

.riwayat-pesanan-alert-info {
  background: rgba(52, 152, 219, 0.1);
  color: var(--info-color);
  border-left: 4px solid var(--info-color);
}

.riwayat-pesanan-alert-icon {
  font-size: var(--font-size-3xl);
  margin-bottom: var(--spacing-md);
  opacity: 0.6;
}

/* Enhanced Table Container */
.riwayat-pesanan-table-container {
  background: var(--card-bg);
  border-radius: var(--radius-2xl);
  box-shadow: var(--shadow-xl);
  border: 1px solid var(--border-color);
  overflow: hidden;
  position: relative;
}

.riwayat-pesanan-table-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color));
}

/* Dark Mode Table Container */
[data-theme="dark"] .riwayat-pesanan-table-container {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-color: #404040;
  box-shadow: 0 16px 32px rgba(0, 0, 0, 0.6);
}

[data-theme="dark"] .riwayat-pesanan-table-container::before {
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color));
  box-shadow: 0 4px 20px rgba(231, 76, 60, 0.4);
}

/* Modern Table Styles */
.riwayat-pesanan-table {
  margin: 0;
  border-collapse: separate;
  border-spacing: 0;
}

.riwayat-pesanan-table thead th {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
  font-weight: 700;
  font-size: var(--font-size-base);
  padding: var(--spacing-lg) var(--spacing-md);
  text-align: center;
  border: none;
  position: relative;
}

.riwayat-pesanan-table thead th::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: rgba(255, 255, 255, 0.3);
}

/* Dark Mode Table Header */
[data-theme="dark"] .riwayat-pesanan-table thead th {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  color: var(--text-primary);
  border-bottom: 2px solid var(--primary-color);
}

[data-theme="dark"] .riwayat-pesanan-table thead th::after {
  background: var(--primary-color);
  height: 2px;
}

.riwayat-pesanan-table tbody tr {
  transition: var(--transition-normal);
  border-bottom: 1px solid var(--border-color);
}

.riwayat-pesanan-table tbody tr:hover {
  background: var(--hover-bg);
  transform: scale(1.01);
  box-shadow: var(--shadow-md);
}

.riwayat-pesanan-table tbody tr:last-child {
  border-bottom: none;
}

.riwayat-pesanan-table tbody td {
  padding: var(--spacing-lg) var(--spacing-md);
  vertical-align: middle;
  text-align: center;
  color: var(--text-primary);
  border: none;
}

/* Dark Mode Table Body */
[data-theme="dark"] .riwayat-pesanan-table tbody tr {
  border-bottom: 1px solid #404040;
  background: linear-gradient(135deg, rgba(26, 26, 26, 0.8), rgba(45, 45, 45, 0.6));
}

[data-theme="dark"] .riwayat-pesanan-table tbody tr:hover {
  background: linear-gradient(135deg, rgba(64, 64, 64, 0.9), rgba(80, 80, 80, 0.7));
  transform: scale(1.01);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
}

[data-theme="dark"] .riwayat-pesanan-table tbody td {
  color: var(--text-primary);
  border-right: 1px solid #404040;
}

[data-theme="dark"] .riwayat-pesanan-table tbody td:last-child {
  border-right: none;
}

/* Dark Mode Alternating Row Colors */
[data-theme="dark"] .riwayat-pesanan-table tbody tr:nth-child(even) {
  background: linear-gradient(135deg, rgba(32, 32, 32, 0.8), rgba(48, 48, 48, 0.6));
}

[data-theme="dark"] .riwayat-pesanan-table tbody tr:nth-child(even):hover {
  background: linear-gradient(135deg, rgba(70, 70, 70, 0.9), rgba(85, 85, 85, 0.7));
}

/* Enhanced ID Pesanan */
.riwayat-pesanan-id {
  font-weight: 700;
  font-size: var(--font-size-lg);
  color: var(--primary-color);
  font-family: var(--font-secondary);
}

/* Enhanced Nama Pelanggan */
.riwayat-pesanan-nama {
  font-weight: 600;
  color: var(--text-primary);
}

[data-theme="dark"] .riwayat-pesanan-nama {
  color: #000000;
}

/* Enhanced Total Price */
.riwayat-pesanan-total {
  font-family: var(--font-secondary);
  font-weight: 700;
  font-size: var(--font-size-lg);
  color: var(--success-color);
}

/* Enhanced Metode Pembayaran */
.riwayat-pesanan-metode {
  font-weight: 600;
  color: var(--text-secondary);
  background: var(--light-bg);
  padding: var(--spacing-xs) var(--spacing-sm);
  border-radius: var(--radius-md);
  display: inline-block;
}

[data-theme="dark"] .riwayat-pesanan-metode {
  background: rgba(255, 255, 255, 0.1);
  color: #000000;
}

/* Enhanced Status Badges */
.riwayat-pesanan-badge {
  padding: var(--spacing-xs) var(--spacing-md);
  border-radius: var(--radius-xl);
  font-weight: 600;
  font-size: var(--font-size-sm);
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-xs);
  box-shadow: var(--shadow-sm);
  transition: var(--transition-normal);
}

.riwayat-pesanan-badge:hover {
  transform: scale(1.05);
  box-shadow: var(--shadow-md);
}

.riwayat-pesanan-badge-success {
  background: linear-gradient(135deg, var(--success-color), #27ae60);
  color: white;
}

.riwayat-pesanan-badge-warning {
  background: linear-gradient(135deg, var(--warning-color), #f39c12);
  color: white;
}

.riwayat-pesanan-badge-pending {
  background: linear-gradient(135deg, #95a5a6, #7f8c8d);
  color: white;
}

/* Enhanced Tanggal */
.riwayat-pesanan-tanggal {
  font-size: var(--font-size-sm);
  color: var(--text-muted);
  font-weight: 500;
}

/* Empty State */
.riwayat-pesanan-empty {
  text-align: center;
  padding: var(--spacing-3xl);
  color: var(--text-muted);
}

.riwayat-pesanan-empty-icon {
  font-size: var(--font-size-5xl);
  color: var(--text-muted);
  margin-bottom: var(--spacing-lg);
  opacity: 0.5;
}

/* Statistics Bar */
.riwayat-pesanan-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: var(--spacing-lg);
  margin-bottom: var(--spacing-2xl);
}

.riwayat-pesanan-stat-card {
  background: var(--card-bg);
  border-radius: var(--radius-xl);
  padding: var(--spacing-xl);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--border-color);
  transition: var(--transition-normal);
  text-align: center;
}

.riwayat-pesanan-stat-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-xl);
}

[data-theme="dark"] .riwayat-pesanan-stat-card {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-color: #404040;
}

.riwayat-pesanan-stat-icon {
  font-size: var(--font-size-3xl);
  margin-bottom: var(--spacing-sm);
  color: var(--primary-color);
}

.riwayat-pesanan-stat-value {
  font-family: var(--font-secondary);
  font-weight: 800;
  font-size: var(--font-size-3xl);
  color: var(--text-primary);
  margin-bottom: var(--spacing-xs);
}

.riwayat-pesanan-stat-label {
  font-size: var(--font-size-sm);
  color: var(--text-secondary);
  font-weight: 600;
}

/* Responsive Design */
@media (max-width: 768px) {
  .riwayat-pesanan-container {
    padding: var(--spacing-xl) 0;
  }

  .riwayat-pesanan-title {
    font-size: var(--font-size-3xl);
  }

  .riwayat-pesanan-table-container {
    border-radius: var(--radius-lg);
    margin: 0 -15px;
  }

  .riwayat-pesanan-table thead th,
  .riwayat-pesanan-table tbody td {
    padding: var(--spacing-md) var(--spacing-sm);
    font-size: var(--font-size-sm);
  }

  .riwayat-pesanan-stats {
    grid-template-columns: 1fr;
  }

  .riwayat-pesanan-download-section {
    justify-content: center;
    flex-direction: column;
  }

  .btn-download-pdf {
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 576px) {
  .riwayat-pesanan-table {
    font-size: var(--font-size-xs);
  }

  .riwayat-pesanan-table thead th,
  .riwayat-pesanan-table tbody td {
    padding: var(--spacing-sm);
  }
}

/* Animation Classes */
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

.riwayat-pesanan-animate {
  animation: fadeInUp 0.6s ease-out forwards;
}

/* Print Styles */
@media print {
  .riwayat-pesanan-stats {
    display: none !important;
  }

  .riwayat-pesanan-download-section {
    display: none !important;
  }

  .riwayat-pesanan-table-container {
    box-shadow: none;
    border: 1px solid #000;
  }
}
</style>

<section class="riwayat-pesanan-container">
  <div class="container">
    <!-- Modern Page Header -->
    <div class="riwayat-pesanan-header riwayat-pesanan-animate">
      <h1 class="riwayat-pesanan-title">📜 Riwayat Pesanan</h1>
      <p class="riwayat-pesanan-subtitle">Pantau dan kelola semua riwayat pesanan pelanggan dengan mudah dan efisien.</p>
    </div>

    <?php if (empty($pesanan)): ?>
      <!-- Enhanced Empty State -->
      <div class="riwayat-pesanan-alert riwayat-pesanan-alert-info riwayat-pesanan-animate">
        <div class="riwayat-pesanan-alert-icon">
          <i class="bi bi-inbox"></i>
        </div>
        <h5 class="mb-2">Belum Ada Riwayat Pesanan</h5>
        <p class="mb-0">Pesanan pelanggan akan muncul di sini setelah mereka melakukan pemesanan.</p>
      </div>
    <?php else: ?>
      <!-- Statistics Bar -->
      <div class="riwayat-pesanan-stats riwayat-pesanan-animate">
        <div class="riwayat-pesanan-stat-card">
          <div class="riwayat-pesanan-stat-icon">
            <i class="bi bi-receipt"></i>
          </div>
          <div class="riwayat-pesanan-stat-value"><?= count($pesanan) ?></div>
          <div class="riwayat-pesanan-stat-label">Total Pesanan</div>
        </div>
        
        <div class="riwayat-pesanan-stat-card">
          <div class="riwayat-pesanan-stat-icon">
            <i class="bi bi-cash-stack"></i>
          </div>
          <div class="riwayat-pesanan-stat-value">
            Rp <?= number_format(array_sum(array_column($pesanan, 'total')), 0, ',', '.') ?>
          </div>
          <div class="riwayat-pesanan-stat-label">Total Pendapatan</div>
        </div>
      </div>

      <!-- Download Buttons - NEW SECTION -->
      <div class="riwayat-pesanan-download-section riwayat-pesanan-animate">
        <a href="<?= base_url('laporan/download') ?>" class="btn-download-pdf btn-download-primary">
          <i class="bi bi-file-pdf-fill"></i>
          Unduh Laporan Ringkas
        </a>
        <a href="<?= base_url('laporan/download-detail') ?>" class="btn-download-pdf btn-download-success">
          <i class="bi bi-file-earmark-text-fill"></i>
          Unduh Laporan Detail
        </a>
      </div>

      <!-- Enhanced Table Container -->
      <div class="riwayat-pesanan-table-container riwayat-pesanan-animate">
        <table class="table riwayat-pesanan-table">
          <thead>
            <tr>
              <th><i class="bi bi-hash me-1"></i>ID Pesanan</th>
              <th><i class="bi bi-person me-1"></i>Nama Pelanggan</th>
              <th><i class="bi bi-cash me-1"></i>Total</th>
              <th><i class="bi bi-credit-card me-1"></i>Metode Pembayaran</th>
              <th><i class="bi bi-info-circle me-1"></i>Status</th>
              <th><i class="bi bi-calendar me-1"></i>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pesanan as $p): ?>
              <tr class="riwayat-pesanan-animate">
                <td>
                  <span class="riwayat-pesanan-id">#<?= $p['idPesanan'] ?></span>
                </td>
                <td>
                  <span class="riwayat-pesanan-nama"><?= esc($p['namaPelanggan']) ?></span>
                </td>
                <td>
                  <span class="riwayat-pesanan-total">Rp <?= number_format($p['total'], 0, ',', '.') ?></span>
                </td>
                <td>
                  <span class="riwayat-pesanan-metode">
                    <i class="bi bi-credit-card me-1"></i>
                    <?= esc($p['metodePembayaran']) ?>
                  </span>
                </td>
                <td>
                  <span class="riwayat-pesanan-badge 
                    <?= $p['statusPembayaran'] == 'Siap' ? 'riwayat-pesanan-badge-success' : 
                        ($p['statusPembayaran'] == 'Pending' ? 'riwayat-pesanan-badge-warning' : 'riwayat-pesanan-badge-pending') ?>">
                    <i class="bi bi-<?= $p['statusPembayaran'] == 'Siap' ? 'check-circle' : 'clock' ?>"></i>
                    <?= esc($p['statusPembayaran']) ?>
                  </span>
                </td>
                <td>
                  <span class="riwayat-pesanan-tanggal">
                    <i class="bi bi-calendar-event me-1"></i>
                    <?= date('d-m-Y H:i', strtotime($p['waktuPemesanan'])) ?>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</section>

<script>
// Enhanced JavaScript for Riwayat Pesanan
document.addEventListener('DOMContentLoaded', function() {
  // Animate elements on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('riwayat-pesanan-animate');
        }, index * 100);
      }
    });
  }, observerOptions);

  // Observe table rows for animation
  document.querySelectorAll('.riwayat-pesanan-table tbody tr').forEach(row => {
    observer.observe(row);
  });

  // Enhanced badge interactions
  document.querySelectorAll('.riwayat-pesanan-badge').forEach(badge => {
    badge.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.1)';
    });

    badge.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });

  // Auto-hide alerts after 5 seconds
  const alerts = document.querySelectorAll('.riwayat-pesanan-alert');
  alerts.forEach(alert => {
    setTimeout(() => {
      alert.style.opacity = '0';
      alert.style.transform = 'translateY(-20px)';
      setTimeout(() => {
        alert.remove();
      }, 300);
    }, 5000);
  });

  // Theme-aware dynamic adjustments
  function updateThemeElements() {
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    
    // Update any theme-specific behaviors here if needed
    document.querySelectorAll('.riwayat-pesanan-stat-card').forEach(card => {
      card.style.borderColor = isDark ? '#404040' : 'var(--border-color)';
    });
  }

  // Listen for theme changes
  const themeObserver = new MutationObserver(updateThemeElements);
  themeObserver.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ['data-theme']
  });

  // Initial theme update
  updateThemeElements();

  // Add smooth scroll behavior
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        const offsetTop = target.offsetTop - 120;
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });
});
</script>

<?= $this->endSection() ?>