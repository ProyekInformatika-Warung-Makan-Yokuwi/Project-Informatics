<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<style>
/* Enhanced Kelola Menu Styles */
.kelola-menu-container {
  padding: var(--spacing-3xl) 0;
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
  min-height: calc(100vh - 200px);
}

[data-theme="dark"] .kelola-menu-container {
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
}

/* Modern Page Header */
.kelola-menu-header {
  text-align: center;
  margin-bottom: var(--spacing-3xl);
  position: relative;
}

.kelola-menu-title {
  font-family: var(--font-secondary);
  font-weight: 800;
  font-size: var(--font-size-4xl);
  color: var(--primary-color);
  margin-bottom: var(--spacing-lg);
  position: relative;
  display: inline-block;
}

.kelola-menu-title::after {
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

.kelola-menu-subtitle {
  font-size: var(--font-size-lg);
  color: var(--text-secondary);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

/* Enhanced Alert Styles */
.kelola-menu-alert {
  border-radius: var(--radius-xl);
  border: none;
  box-shadow: var(--shadow-md);
  backdrop-filter: blur(10px);
  position: relative;
  overflow: hidden;
}

.kelola-menu-alert::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--success-color), var(--primary-color));
}

.kelola-menu-alert-success {
  background: rgba(39, 174, 96, 0.1);
  color: var(--success-color);
  border-left: 4px solid var(--success-color);
}

/* Modern Action Bar */
.kelola-menu-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: var(--spacing-2xl);
  padding: var(--spacing-xl);
  background: var(--card-bg);
  border-radius: var(--radius-2xl);
  box-shadow: var(--shadow-lg);
  border: 1px solid var(--border-color);
}

.kelola-menu-actions-title {
  font-family: var(--font-secondary);
  font-weight: 700;
  font-size: var(--font-size-xl);
  color: var(--text-primary);
  margin: 0;
}

.kelola-menu-add-btn {
  background: linear-gradient(135deg, var(--success-color), #27ae60);
  color: white;
  border: none;
  border-radius: var(--radius-xl);
  padding: var(--spacing-md) var(--spacing-2xl);
  font-weight: 600;
  font-size: var(--font-size-base);
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-sm);
  transition: var(--transition-normal);
  box-shadow: var(--shadow-md);
  position: relative;
  overflow: hidden;
}

.kelola-menu-add-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.6s;
}

.kelola-menu-add-btn:hover::before {
  left: 100%;
}

.kelola-menu-add-btn:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-xl);
  background: linear-gradient(135deg, #27ae60, var(--success-color));
}

/* Enhanced Table Container */
.kelola-menu-table-container {
  background: var(--card-bg);
  border-radius: var(--radius-2xl);
  box-shadow: var(--shadow-xl);
  border: 1px solid var(--border-color);
  overflow: hidden;
  position: relative;
}

.kelola-menu-table-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color));
}

/* Dark Mode Table Container */
[data-theme="dark"] .kelola-menu-table-container {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-color: #404040;
  box-shadow: 0 16px 32px rgba(0, 0, 0, 0.6);
}

[data-theme="dark"] .kelola-menu-table-container::before {
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color));
  box-shadow: 0 4px 20px rgba(231, 76, 60, 0.4);
}

/* Modern Table Styles */
.kelola-menu-table {
  margin: 0;
  border-collapse: separate;
  border-spacing: 0;
}

.kelola-menu-table thead th {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
  font-weight: 700;
  font-size: var(--font-size-base);
  padding: var(--spacing-lg) var(--spacing-md);
  text-align: center;
  border: none;
  position: relative;
}

.kelola-menu-table thead th::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: rgba(255, 255, 255, 0.3);
}

/* Dark Mode Table Header */
[data-theme="dark"] .kelola-menu-table thead th {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  color: var(--text-primary);
  border-bottom: 2px solid var(--primary-color);
}

[data-theme="dark"] .kelola-menu-table thead th::after {
  background: var(--primary-color);
  height: 2px;
}

.kelola-menu-table tbody tr {
  transition: var(--transition-normal);
  border-bottom: 1px solid var(--border-color);
}

.kelola-menu-table tbody tr:hover {
  background: var(--hover-bg);
  transform: scale(1.01);
  box-shadow: var(--shadow-md);
}

.kelola-menu-table tbody tr:last-child {
  border-bottom: none;
}

.kelola-menu-table tbody td {
  padding: var(--spacing-lg) var(--spacing-md);
  vertical-align: middle;
  text-align: center;
  color: var(--text-primary);
  border: none;
}

/* Dark Mode Table Body */
[data-theme="dark"] .kelola-menu-table tbody tr {
  border-bottom: 1px solid #404040;
  background: linear-gradient(135deg, rgba(26, 26, 26, 0.8), rgba(45, 45, 45, 0.6));
}

[data-theme="dark"] .kelola-menu-table tbody tr:hover {
  background: linear-gradient(135deg, rgba(64, 64, 64, 0.9), rgba(80, 80, 80, 0.7));
  transform: scale(1.01);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
}

[data-theme="dark"] .kelola-menu-table tbody td {
  color: var(--text-primary);
  border-right: 1px solid #404040;
}

[data-theme="dark"] .kelola-menu-table tbody td:last-child {
  border-right: none;
}

/* Dark Mode Alternating Row Colors */
[data-theme="dark"] .kelola-menu-table tbody tr:nth-child(even) {
  background: linear-gradient(135deg, rgba(32, 32, 32, 0.8), rgba(48, 48, 48, 0.6));
}

[data-theme="dark"] .kelola-menu-table tbody tr:nth-child(even):hover {
  background: linear-gradient(135deg, rgba(70, 70, 70, 0.9), rgba(85, 85, 85, 0.7));
}

/* Enhanced Image Display */
.kelola-menu-image {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  transition: var(--transition-normal);
  border: 3px solid var(--card-bg);
}

.kelola-menu-image:hover {
  transform: scale(1.1) rotate(5deg);
  box-shadow: var(--shadow-lg);
}

/* Modern Menu Name */
.kelola-menu-name {
  font-weight: 600;
  font-size: var(--font-size-lg);
  color: var(--text-primary);
  margin: 0;
}

/* Enhanced Price Display */
.kelola-menu-price {
  font-family: var(--font-secondary);
  font-weight: 700;
  font-size: var(--font-size-lg);
  color: var(--primary-color);
  margin: 0;
}

/* Modern Action Buttons */
.kelola-menu-actions-cell {
  display: flex;
  gap: var(--spacing-sm);
  justify-content: center;
  align-items: center;
}

.kelola-menu-btn {
  border-radius: var(--radius-lg);
  padding: var(--spacing-sm) var(--spacing-md);
  font-weight: 600;
  font-size: var(--font-size-sm);
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-xs);
  transition: var(--transition-normal);
  border: none;
  position: relative;
  overflow: hidden;
  min-width: 80px;
  justify-content: center;
}

.kelola-menu-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.5s;
}

.kelola-menu-btn:hover::before {
  left: 100%;
}

.kelola-menu-btn:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.kelola-menu-btn-edit {
  background: linear-gradient(135deg, var(--warning-color), #f39c12);
  color: white;
}

.kelola-menu-btn-edit:hover {
  background: linear-gradient(135deg, #f39c12, var(--warning-color));
  box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
}

.kelola-menu-btn-delete {
  background: linear-gradient(135deg, var(--danger-color), #e74c3c);
  color: white;
}

.kelola-menu-btn-delete:hover {
  background: linear-gradient(135deg, #e74c3c, var(--danger-color));
  box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
}

/* Empty State */
.kelola-menu-empty {
  text-align: center;
  padding: var(--spacing-3xl);
  color: var(--text-muted);
  font-style: italic;
}

.kelola-menu-empty-icon {
  font-size: var(--font-size-5xl);
  color: var(--text-muted);
  margin-bottom: var(--spacing-lg);
  opacity: 0.5;
}

/* Responsive Design */
@media (max-width: 768px) {
  .kelola-menu-container {
    padding: var(--spacing-xl) 0;
  }

  .kelola-menu-title {
    font-size: var(--font-size-3xl);
  }

  .kelola-menu-actions {
    flex-direction: column;
    gap: var(--spacing-lg);
    text-align: center;
  }

  .kelola-menu-table-container {
    border-radius: var(--radius-lg);
    margin: 0 -15px;
  }

  .kelola-menu-table thead th,
  .kelola-menu-table tbody td {
    padding: var(--spacing-md) var(--spacing-sm);
    font-size: var(--font-size-sm);
  }

  .kelola-menu-image {
    width: 60px;
    height: 60px;
  }

  .kelola-menu-name {
    font-size: var(--font-size-base);
  }

  .kelola-menu-price {
    font-size: var(--font-size-base);
  }

  .kelola-menu-actions-cell {
    flex-direction: column;
    gap: var(--spacing-xs);
  }

  .kelola-menu-btn {
    width: 100%;
    min-width: auto;
  }
}

@media (max-width: 576px) {
  .kelola-menu-table {
    font-size: var(--font-size-xs);
  }

  .kelola-menu-table thead th,
  .kelola-menu-table tbody td {
    padding: var(--spacing-sm);
  }

  .kelola-menu-image {
    width: 50px;
    height: 50px;
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

.kelola-menu-animate {
  animation: fadeInUp 0.6s ease-out forwards;
}

/* Loading State */
.kelola-menu-loading {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: var(--spacing-3xl);
}

.kelola-menu-spinner {
  width: 40px;
  height: 40px;
  border: 4px solid var(--border-color);
  border-top: 4px solid var(--primary-color);
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Enhanced Focus States */
.kelola-menu-btn:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.3);
}

/* Print Styles */
@media print {
  .kelola-menu-actions,
  .kelola-menu-btn {
    display: none !important;
  }

  .kelola-menu-table-container {
    box-shadow: none;
    border: 1px solid #000;
  }
}
</style>

<section class="kelola-menu-container">
  <div class="container">
    <!-- Modern Page Header -->
    <div class="kelola-menu-header kelola-menu-animate">
      <h1 class="kelola-menu-title">Kelola Menu</h1>
      <p class="kelola-menu-subtitle">Kelola menu makanan dengan mudah dan efisien. Tambah, edit, atau hapus item menu sesuai kebutuhan bisnis Anda.</p>
    </div>

    <!-- Enhanced Alert Messages -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert kelola-menu-alert kelola-menu-alert-success kelola-menu-animate" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <!-- Modern Action Bar -->
    <div class="kelola-menu-actions kelola-menu-animate">
      <h2 class="kelola-menu-actions-title">
        <i class="bi bi-list-ul me-2"></i>
        Daftar Menu
      </h2>
      <a href="<?= site_url('admin/kelola-menu/tambah') ?>" class="kelola-menu-add-btn">
        <i class="bi bi-plus-circle"></i>
        Tambah Menu
      </a>
    </div>

    <!-- Enhanced Table Container -->
    <div class="kelola-menu-table-container kelola-menu-animate">
      <table class="table kelola-menu-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash me-1"></i>No</th>
            <th><i class="bi bi-image me-1"></i>Gambar</th>
            <th><i class="bi bi-tag me-1"></i>Nama Menu</th>
            <th><i class="bi bi-cash me-1"></i>Harga</th>
            <th><i class="bi bi-gear me-1"></i>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($menuList)): ?>
            <?php $no = 1; foreach ($menuList as $menu): ?>
              <tr class="kelola-menu-animate">
                <td>
                  <span class="fw-bold text-primary"><?= $no++ ?></span>
                </td>
                <td>
                  <img src="<?= base_url('images/' . esc($menu['gambar'] ?? 'default.jpg')) ?>"
                       alt="<?= esc($menu['namaMenu']) ?>"
                       class="kelola-menu-image">
                </td>
                <td>
                  <h6 class="kelola-menu-name"><?= esc($menu['namaMenu']) ?></h6>
                </td>
                <td>
                  <span class="kelola-menu-price">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></span>
                </td>
                <td>
                  <div class="kelola-menu-actions-cell">
                    <a href="<?= site_url('admin/kelola-menu/edit/' . $menu['idMenu']) ?>"
                       class="kelola-menu-btn kelola-menu-btn-edit"
                       title="Edit Menu">
                      <i class="bi bi-pencil-square"></i>
                      Edit
                    </a>
                    <a href="<?= site_url('admin/kelola-menu/delete/' . $menu['idMenu']) ?>"
                       onclick="return confirm('Yakin ingin menghapus menu ini?')"
                       class="kelola-menu-btn kelola-menu-btn-delete"
                       title="Hapus Menu">
                      <i class="bi bi-trash"></i>
                      Hapus
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="kelola-menu-empty">
                <div class="kelola-menu-empty-icon">
                  <i class="bi bi-inbox"></i>
                </div>
                <p class="mb-0">Belum ada data menu.</p>
                <small>Silakan tambah menu baru untuk memulai.</small>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
// Enhanced JavaScript for Kelola Menu
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
          entry.target.classList.add('kelola-menu-animate');
        }, index * 100);
      }
    });
  }, observerOptions);

  // Observe table rows for animation
  document.querySelectorAll('.kelola-menu-table tbody tr').forEach(row => {
    observer.observe(row);
  });

  // Enhanced button interactions
  document.querySelectorAll('.kelola-menu-btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-2px) scale(1.05)';
    });

    btn.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });

  // Smooth scroll for anchor links
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

  // Auto-hide alerts after 5 seconds
  const alerts = document.querySelectorAll('.kelola-menu-alert');
  alerts.forEach(alert => {
    setTimeout(() => {
      alert.style.opacity = '0';
      alert.style.transform = 'translateY(-20px)';
      setTimeout(() => {
        alert.remove();
      }, 300);
    }, 5000);
  });

  // Enhanced image loading
  document.querySelectorAll('.kelola-menu-image').forEach(img => {
    img.addEventListener('load', function() {
      this.style.opacity = '1';
    });
    img.style.opacity = '0';
    img.style.transition = 'opacity 0.3s ease';
  });

  // Add loading state for actions
  document.querySelectorAll('.kelola-menu-btn-delete').forEach(btn => {
    btn.addEventListener('click', function(e) {
      if (!confirm('Yakin ingin menghapus menu ini?')) {
        e.preventDefault();
        return;
      }

      this.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Menghapus...';
      this.style.pointerEvents = 'none';
      this.style.opacity = '0.7';
    });
  });

  // Keyboard navigation for table
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && e.target.closest('.kelola-menu-btn')) {
      e.target.click();
    }
  });

  // Theme-aware dynamic adjustments
  function updateThemeElements() {
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';

    // Update any theme-specific behaviors here if needed
    document.querySelectorAll('.kelola-menu-image').forEach(img => {
      img.style.borderColor = isDark ? 'var(--border-color)' : 'var(--card-bg)';
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
});
</script>

<?= $this->endSection() ?>
