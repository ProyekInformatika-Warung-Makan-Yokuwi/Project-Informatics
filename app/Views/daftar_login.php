<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<style>
/* Enhanced Daftar Akun Admin Styles */
.daftar-akun-container {
  padding: var(--spacing-3xl) 0;
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
  min-height: calc(100vh - 200px);
}

[data-theme="dark"] .daftar-akun-container {
  background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
}

/* Modern Page Header */
.daftar-akun-header {
  text-align: center;
  margin-bottom: var(--spacing-3xl);
  position: relative;
}

.daftar-akun-title {
  font-family: var(--font-secondary);
  font-weight: 800;
  font-size: var(--font-size-4xl);
  color: var(--primary-color);
  margin-bottom: var(--spacing-lg);
  position: relative;
  display: inline-block;
}

.daftar-akun-title::after {
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

.daftar-akun-subtitle {
  font-size: var(--font-size-lg);
  color: var(--text-secondary);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

/* Enhanced Login Info Card */
.daftar-akun-login-card {
  background: var(--card-bg);
  border-radius: var(--radius-2xl);
  box-shadow: var(--shadow-xl);
  border: 1px solid var(--border-color);
  overflow: hidden;
  margin-bottom: var(--spacing-2xl);
  position: relative;
}

.daftar-akun-login-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
}

[data-theme="dark"] .daftar-akun-login-card {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-color: #404040;
}

.daftar-akun-login-header {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
  padding: var(--spacing-lg) var(--spacing-xl);
  border-bottom: none;
}

[data-theme="dark"] .daftar-akun-login-header {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-bottom: 2px solid var(--primary-color);
}

.daftar-akun-login-header h4 {
  font-family: var(--font-secondary);
  font-weight: 700;
  font-size: var(--font-size-xl);
  margin: 0;
  display: flex;
  align-items: center;
  gap: var(--spacing-sm);
}

.daftar-akun-login-body {
  padding: var(--spacing-xl);
}

.daftar-akun-login-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: var(--spacing-lg);
}

.daftar-akun-login-item {
  display: flex;
  align-items: center;
  gap: var(--spacing-md);
  padding: var(--spacing-md);
  background: var(--light-bg);
  border-radius: var(--radius-lg);
  transition: var(--transition-normal);
}

[data-theme="dark"] .daftar-akun-login-item {
  background: rgba(255, 255, 255, 0.05);
}

.daftar-akun-login-item:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.daftar-akun-login-icon {
  font-size: var(--font-size-2xl);
  color: var(--primary-color);
}

.daftar-akun-login-details {
  flex: 1;
}

.daftar-akun-login-label {
  font-size: var(--font-size-sm);
  color: var(--text-secondary);
  font-weight: 600;
  margin-bottom: var(--spacing-xs);
}

.daftar-akun-login-value {
  font-size: var(--font-size-base);
  color: var(--text-primary);
  font-weight: 700;
}

[data-theme="dark"] .daftar-akun-login-value {
  color: #ffffff;
}

/* Modern Action Bar */
.daftar-akun-actions {
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

[data-theme="dark"] .daftar-akun-actions {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-color: #404040;
}

.daftar-akun-actions-title {
  font-family: var(--font-secondary);
  font-weight: 700;
  font-size: var(--font-size-xl);
  color: var(--text-primary);
  margin: 0;
}

.daftar-akun-add-btn {
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

.daftar-akun-add-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.6s;
}

.daftar-akun-add-btn:hover::before {
  left: 100%;
}

.daftar-akun-add-btn:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-xl);
  background: linear-gradient(135deg, #27ae60, var(--success-color));
}

/* Enhanced Table Container */
.daftar-akun-table-container {
  background: var(--card-bg);
  border-radius: var(--radius-2xl);
  box-shadow: var(--shadow-xl);
  border: 1px solid var(--border-color);
  overflow: hidden;
  position: relative;
}

.daftar-akun-table-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color));
}

[data-theme="dark"] .daftar-akun-table-container {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  border-color: #404040;
  box-shadow: 0 16px 32px rgba(0, 0, 0, 0.6);
}

/* Modern Table Styles */
.daftar-akun-table {
  margin: 0;
  border-collapse: separate;
  border-spacing: 0;
}

.daftar-akun-table thead th {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
  font-weight: 700;
  font-size: var(--font-size-base);
  padding: var(--spacing-lg) var(--spacing-md);
  text-align: center;
  border: none;
  position: relative;
}

.daftar-akun-table thead th::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: rgba(255, 255, 255, 0.3);
}

[data-theme="dark"] .daftar-akun-table thead th {
  background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
  color: var(--text-primary);
  border-bottom: 2px solid var(--primary-color);
}

[data-theme="dark"] .daftar-akun-table thead th::after {
  background: var(--primary-color);
  height: 2px;
}

.daftar-akun-table tbody tr {
  transition: var(--transition-normal);
  border-bottom: 1px solid var(--border-color);
}

.daftar-akun-table tbody tr:hover {
  background: var(--hover-bg);
  transform: scale(1.01);
  box-shadow: var(--shadow-md);
}

.daftar-akun-table tbody tr:last-child {
  border-bottom: none;
}

.daftar-akun-table tbody td {
  padding: var(--spacing-lg) var(--spacing-md);
  vertical-align: middle;
  text-align: center;
  color: var(--text-primary);
  border: none;
}

[data-theme="dark"] .daftar-akun-table tbody tr {
  border-bottom: 1px solid #404040;
  background: linear-gradient(135deg, rgba(26, 26, 26, 0.8), rgba(45, 45, 45, 0.6));
}

[data-theme="dark"] .daftar-akun-table tbody tr:hover {
  background: linear-gradient(135deg, rgba(64, 64, 64, 0.9), rgba(80, 80, 80, 0.7));
  transform: scale(1.01);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
}

[data-theme="dark"] .daftar-akun-table tbody td {
  color: var(--text-primary);
  border-right: 1px solid #404040;
}

[data-theme="dark"] .daftar-akun-table tbody td:last-child {
  border-right: none;
}

[data-theme="dark"] .daftar-akun-table tbody tr:nth-child(even) {
  background: linear-gradient(135deg, rgba(32, 32, 32, 0.8), rgba(48, 48, 48, 0.6));
}

[data-theme="dark"] .daftar-akun-table tbody tr:nth-child(even):hover {
  background: linear-gradient(135deg, rgba(70, 70, 70, 0.9), rgba(85, 85, 85, 0.7));
}

/* Enhanced ID Display */
.daftar-akun-id {
  font-weight: 700;
  font-size: var(--font-size-lg);
  color: var(--primary-color);
  font-family: var(--font-secondary);
}

/* Enhanced Nama Display */
.daftar-akun-nama {
  font-weight: 600;
  color: var(--text-primary);
}

[data-theme="dark"] .daftar-akun-nama {
  color: #000000;
}

/* Enhanced Email Display */
.daftar-akun-email {
  font-weight: 600;
  color: var(--text-secondary);
}

[data-theme="dark"] .daftar-akun-email {
  color: #000000;
}

/* Enhanced Role Badge */
.daftar-akun-role {
  padding: var(--spacing-xs) var(--spacing-md);
  border-radius: var(--radius-xl);
  font-weight: 600;
  font-size: var(--font-size-sm);
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-xs);
  box-shadow: var(--shadow-sm);
  transition: var(--transition-normal);
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
}

.daftar-akun-role:hover {
  transform: scale(1.05);
  box-shadow: var(--shadow-md);
}

/* Modern Action Buttons */
.daftar-akun-actions-cell {
  display: flex;
  gap: var(--spacing-sm);
  justify-content: center;
  align-items: center;
}

.daftar-akun-btn {
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

.daftar-akun-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.5s;
}

.daftar-akun-btn:hover::before {
  left: 100%;
}

.daftar-akun-btn:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.daftar-akun-btn-edit {
  background: linear-gradient(135deg, var(--warning-color), #f39c12);
  color: white;
}

.daftar-akun-btn-edit:hover {
  background: linear-gradient(135deg, #f39c12, var(--warning-color));
  box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
}

.daftar-akun-btn-delete {
  background: linear-gradient(135deg, var(--danger-color), #e74c3c);
  color: white;
}

.daftar-akun-btn-delete:hover {
  background: linear-gradient(135deg, #e74c3c, var(--danger-color));
  box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
}

/* Empty State */
.daftar-akun-empty {
  text-align: center;
  padding: var(--spacing-3xl);
  color: var(--text-muted);
  font-style: italic;
}

.daftar-akun-empty-icon {
  font-size: var(--font-size-5xl);
  color: var(--text-muted);
  margin-bottom: var(--spacing-lg);
  opacity: 0.5;
}

/* Responsive Design */
@media (max-width: 768px) {
  .daftar-akun-container {
    padding: var(--spacing-xl) 0;
  }

  .daftar-akun-title {
    font-size: var(--font-size-3xl);
  }

  .daftar-akun-actions {
    flex-direction: column;
    gap: var(--spacing-lg);
    text-align: center;
  }

  .daftar-akun-login-info {
    grid-template-columns: 1fr;
  }

  .daftar-akun-table-container {
    border-radius: var(--radius-lg);
    margin: 0 -15px;
  }

  .daftar-akun-table thead th,
  .daftar-akun-table tbody td {
    padding: var(--spacing-md) var(--spacing-sm);
    font-size: var(--font-size-sm);
  }

  .daftar-akun-actions-cell {
    flex-direction: column;
    gap: var(--spacing-xs);
  }

  .daftar-akun-btn {
    width: 100%;
    min-width: auto;
  }
}

@media (max-width: 576px) {
  .daftar-akun-table {
    font-size: var(--font-size-xs);
  }

  .daftar-akun-table thead th,
  .daftar-akun-table tbody td {
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

.daftar-akun-animate {
  animation: fadeInUp 0.6s ease-out forwards;
}

/* Print Styles */
@media print {
  .daftar-akun-actions,
  .daftar-akun-btn {
    display: none !important;
  }

  .daftar-akun-table-container {
    box-shadow: none;
    border: 1px solid #000;
  }
}
</style>

<section class="daftar-akun-container">
  <div class="container">
    <!-- Modern Page Header -->
    <div class="daftar-akun-header daftar-akun-animate">
      <h1 class="daftar-akun-title">Daftar Akun Admin</h1>
      <p class="daftar-akun-subtitle">Kelola akun admin dengan mudah dan aman. Tambah, edit, atau hapus akun sesuai kebutuhan sistem Anda.</p>
    </div>

    <!-- Enhanced Login Info Card -->
    <?php if ($isLoggedIn): ?>
      <div class="daftar-akun-login-card daftar-akun-animate">
        <div class="daftar-akun-login-header">
          <h4>
            <i class="bi bi-person-circle"></i>
            Akun yang Sedang Login
          </h4>
        </div>
        <div class="daftar-akun-login-body">
          <div class="daftar-akun-login-info">
            <div class="daftar-akun-login-item">
              <div class="daftar-akun-login-icon">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="daftar-akun-login-details">
                <div class="daftar-akun-login-label">Email</div>
                <div class="daftar-akun-login-value"><?= esc($email) ?></div>
              </div>
            </div>
            <div class="daftar-akun-login-item">
              <div class="daftar-akun-login-icon">
                <i class="bi bi-shield-fill-check"></i>
              </div>
              <div class="daftar-akun-login-details">
                <div class="daftar-akun-login-label">Role</div>
                <div class="daftar-akun-login-value"><?= esc($role) ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Modern Action Bar -->
    <div class="daftar-akun-actions daftar-akun-animate">
      <h2 class="daftar-akun-actions-title">
        <i class="bi bi-people me-2"></i>
        Daftar Semua Admin
      </h2>
      <a href="<?= site_url('admin/tambah-akun') ?>" class="daftar-akun-add-btn">
        <i class="bi bi-person-plus"></i>
        Tambah Akun
      </a>
    </div>

    <!-- Enhanced Table Container -->
    <div class="daftar-akun-table-container daftar-akun-animate">
      <table class="table daftar-akun-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash me-1"></i>ID</th>
            <th><i class="bi bi-person me-1"></i>Nama</th>
            <th><i class="bi bi-envelope me-1"></i>Email</th>
            <th><i class="bi bi-shield me-1"></i>Role</th>
            <th><i class="bi bi-gear me-1"></i>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($admins) && is_array($admins)): ?>
            <?php foreach ($admins as $admin): ?>
              <tr class="daftar-akun-animate">
                <td>
                  <span class="daftar-akun-id"><?= esc($admin['id']) ?></span>
                </td>
                <td>
                  <span class="daftar-akun-nama"><?= esc($admin['nama']) ?></span>
                </td>
                <td>
                  <span class="daftar-akun-email"><?= esc($admin['email']) ?></span>
                </td>
                <td>
                  <span class="daftar-akun-role">
                    <i class="bi bi-shield-check"></i>
                    <?= esc($admin['role']) ?>
                  </span>
                </td>
                <td>
                  <div class="daftar-akun-actions-cell">
                    <a href="<?= site_url('admin/edit-akun/' . $admin['id']) ?>"
                       class="daftar-akun-btn daftar-akun-btn-edit"
                       title="Edit Akun">
                      <i class="bi bi-pencil-square"></i>
                      Edit
                    </a>
                    <a href="<?= site_url('admin/hapus-akun/' . $admin['id']) ?>"
                       onclick="return confirm('Yakin ingin menghapus akun ini?')"
                       class="daftar-akun-btn daftar-akun-btn-delete"
                       title="Hapus Akun">
                      <i class="bi bi-trash"></i>
                      Hapus
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="daftar-akun-empty">
                <div class="daftar-akun-empty-icon">
                  <i class="bi bi-inbox"></i>
                </div>
                <p class="mb-0">Tidak ada data akun admin.</p>
                <small>Silakan tambah akun baru untuk memulai.</small>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
// Enhanced JavaScript for Daftar Akun Admin
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
          entry.target.classList.add('daftar-akun-animate');
        }, index * 100);
      }
    });
  }, observerOptions);

  // Observe table rows for animation
  document.querySelectorAll('.daftar-akun-table tbody tr').forEach(row => {
    observer.observe(row);
  });

  // Enhanced button interactions
  document.querySelectorAll('.daftar-akun-btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-2px) scale(1.05)';
    });

    btn.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });

  // Enhanced role badge interactions
  document.querySelectorAll('.daftar-akun-role').forEach(badge => {
    badge.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.1) rotate(2deg)';
    });

    badge.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1) rotate(0deg)';
    });
  });

  // Add loading state for delete action
  document.querySelectorAll('.daftar-akun-btn-delete').forEach(btn => {
    btn.addEventListener('click', function(e) {
      if (!confirm('Yakin ingin menghapus akun ini?')) {
        e.preventDefault();
        return;
      }

      this.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Menghapus...';
      this.style.pointerEvents = 'none';
      this.style.opacity = '0.7';
    });
  });

  // Theme-aware dynamic adjustments
  function updateThemeElements() {
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    
    // Update any theme-specific behaviors
    document.querySelectorAll('.daftar-akun-login-item').forEach(item => {
      item.style.borderColor = isDark ? '#404040' : 'var(--border-color)';
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
});
</script>

<?= $this->endSection() ?>