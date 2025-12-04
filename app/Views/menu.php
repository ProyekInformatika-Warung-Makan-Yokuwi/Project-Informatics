<?php $this->setVar('title', 'Menu - Warung Makan Yokuwi'); ?>
<?php $this->setVar('showSearch', true); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<!-- Hero Section Menu -->
<section class="menu-hero-section py-5 position-relative overflow-hidden">
  <!-- Background Pattern -->
  <div class="hero-bg-pattern position-absolute top-0 start-0 w-100 h-100" style="background-image: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);"></div>

  <!-- Floating Shapes like Home Page -->
  <div class="floating-shapes">
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
  </div>

  <div class="container position-relative">
    <div class="row align-items-center">
      <div class="col-lg-6 text-center text-lg-start">
        <div class="hero-content-wrapper">
          <h1 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeIn text-shadow-lg">
            Menu Lengkap Yokuwi
          </h1>
          <p class="lead text-light mb-4 animate__animated animate__fadeIn animate__delay-1s" style="opacity: 0.9;">
            Pilih dari berbagai hidangan lezat dan minuman segar yang siap memanjakan lidah Anda
          </p>
          <div class="menu-stats animate__animated animate__fadeIn animate__delay-2s">
            <div class="d-flex justify-content-center justify-content-lg-start gap-4 flex-wrap">
              <div class="stat-item text-center p-3 rounded-4" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                <div class="stat-number text-warning fw-bold fs-3 mb-1" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">50+</div>
                <div class="stat-label text-light small fw-semibold">Variasi Menu</div>
              </div>
              <div class="stat-item text-center p-3 rounded-4" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                <div class="stat-number text-warning fw-bold fs-3 mb-1" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">100%</div>
                <div class="stat-label text-light small fw-semibold">Bahan Segar</div>
              </div>
              <div class="stat-item text-center p-3 rounded-4" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                <div class="stat-number text-warning fw-bold fs-3 mb-1" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">24/7</div>
                <div class="stat-label text-light small fw-semibold">Tersedia</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="hero-menu-image animate__animated animate__fadeIn animate__delay-3s position-relative">
          <div class="image-glow position-absolute" style="top: -10px; left: -10px; right: -10px; bottom: -10px; background: linear-gradient(45deg, rgba(255,255,255,0.2), rgba(243,156,18,0.3)); border-radius: 20px; filter: blur(20px); z-index: 1;"></div>
          <img src="<?= base_url('images/gambar_tambahan_menu.png') ?>" alt="Menu Yokuwi" class="img-fluid rounded-4 shadow-xl position-relative" style="z-index: 2;">
        </div>
      </div>
    </div>


  </div>
</section>

<!-- Menu Categories Section -->
<section class="menu-categories-section py-5">
  <div class="container">
    <!-- Category Tabs -->
    <div class="category-tabs mb-5">
      <ul class="nav nav-pills justify-content-center mb-4" id="menuTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active category-tab" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab">
            <i class="bi bi-grid me-2"></i>Semua Menu
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link category-tab" id="food-tab" data-bs-toggle="pill" data-bs-target="#food" type="button" role="tab">
            <i class="bi bi-egg-fried me-2"></i>Makanan
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link category-tab" id="drinks-tab" data-bs-toggle="pill" data-bs-target="#drinks" type="button" role="tab">
            <i class="bi bi-cup-straw me-2"></i>Minuman
          </button>
        </li>
      </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="menuTabsContent">
      <!-- All Menu Tab -->
      <div class="tab-pane fade show active" id="all" role="tabpanel">
        <div class="row g-4 justify-content-center" id="all-menu">
          <?php if (!empty($menuList) && is_array($menuList)): ?>
            <?php foreach ($menuList as $menu): ?>
              <?php
                $gambarPath = base_url('images/' . esc($menu['gambar']));
                $fullPath = FCPATH . 'images/' . $menu['gambar'];
                if (!file_exists($fullPath) || empty($menu['gambar'])) {
                  $gambarPath = base_url('images/default.jpg');
                }
                // Determine category
                $menuName = strtolower($menu['namaMenu']);
                $isDrink = in_array($menuName, ['es jeruk', 'kopi hitam', 'es teh', 'air es', 'es susu coklat', 'air mineral']);
                $category = $isDrink ? 'minuman' : 'makanan';
              ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 menu-item" data-category="<?= $category ?>">
                <div class="card menu-card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
                  <div class="category-badge">
                    <span class="badge bg-<?= $isDrink ? 'info' : 'success' ?> rounded-pill">
                      <i class="bi bi-<?= $isDrink ? 'cup-straw' : 'egg-fried' ?> me-1"></i>
                      <?= $isDrink ? 'Minuman' : 'Makanan' ?>
                    </span>
                  </div>
                  <a href="<?= site_url('menu/detail/' . $menu['idMenu']) ?>" class="menu-img-wrapper">
                    <img src="<?= $gambarPath ?>"
                         alt="<?= esc($menu['namaMenu']) ?>"
                         class="card-img-top menu-img">
                  </a>
                  <div class="card-body text-center p-4">
                    <h5 class="fw-bold text-dark mb-2" style="color: var(--text-primary) !important;"><?= esc($menu['namaMenu']) ?></h5>
                    <p class="text-danger fw-semibold fs-5 mb-4" style="color: var(--primary-color) !important;">
                      Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?>
                    </p>

                    <div class="d-flex justify-content-center gap-2">
                      <!-- Tombol Tambah ke Keranjang (AJAX) -->
                      <form class="add-to-cart-form" action="/cart/add" method="post">
                        <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                          🛒 Tambah
                        </button>
                      </form>

                      <!-- Tombol Pesan Langsung -->
                      <form action="/menu/orderNow" method="post">
                        <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                        <button type="submit" class="btn btn-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                          ⚡ Pesan
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-12">
              <p class="text-center text-muted fs-4">Belum ada menu yang tersedia.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Food Tab -->
      <div class="tab-pane fade" id="food" role="tabpanel">
        <div class="row g-4 justify-content-center" id="food-menu">
          <?php if (!empty($menuList) && is_array($menuList)): ?>
            <?php foreach ($menuList as $menu): ?>
              <?php
                $menuName = strtolower($menu['namaMenu']);
                $isDrink = in_array($menuName, ['es jeruk', 'kopi hitam', 'es teh', 'air es', 'es susu coklat', 'air mineral']);
                if ($isDrink) continue; // Skip drinks in food tab

                $gambarPath = base_url('images/' . esc($menu['gambar']));
                $fullPath = FCPATH . 'images/' . $menu['gambar'];
                if (!file_exists($fullPath) || empty($menu['gambar'])) {
                  $gambarPath = base_url('images/default.jpg');
                }
              ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card menu-card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
                  <div class="category-badge">
                    <span class="badge bg-success rounded-pill">
                      <i class="bi bi-egg-fried me-1"></i>Makanan
                    </span>
                  </div>
                  <a href="<?= site_url('menu/detail/' . $menu['idMenu']) ?>" class="menu-img-wrapper">
                    <img src="<?= $gambarPath ?>"
                         alt="<?= esc($menu['namaMenu']) ?>"
                         class="card-img-top menu-img">
                  </a>
                  <div class="card-body text-center p-4">
                    <h5 class="fw-bold text-white mb-2" style="color: var(--text-primary) !important;"><?= esc($menu['namaMenu']) ?></h5>
                    <p class="text-danger fw-semibold fs-5 mb-4" style="color: var(--primary-color) !important;">
                      Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?>
                    </p>

                    <div class="d-flex justify-content-center gap-2">
                      <form class="add-to-cart-form" action="/cart/add" method="post">
                        <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                          🛒 Tambah
                        </button>
                      </form>

                      <form action="/menu/orderNow" method="post">
                        <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                        <button type="submit" class="btn btn-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                          ⚡ Pesan
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-12">
              <p class="text-center text-muted fs-4">Belum ada menu makanan yang tersedia.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Drinks Tab -->
      <div class="tab-pane fade" id="drinks" role="tabpanel">
        <div class="row g-4 justify-content-center" id="drinks-menu">
          <?php if (!empty($menuList) && is_array($menuList)): ?>
            <?php foreach ($menuList as $menu): ?>
              <?php
                $menuName = strtolower($menu['namaMenu']);
                $isDrink = in_array($menuName, ['es jeruk', 'kopi hitam', 'es teh', 'air es', 'es susu coklat', 'air mineral']);
                if (!$isDrink) continue; // Skip food in drinks tab

                $gambarPath = base_url('images/' . esc($menu['gambar']));
                $fullPath = FCPATH . 'images/' . $menu['gambar'];
                if (!file_exists($fullPath) || empty($menu['gambar'])) {
                  $gambarPath = base_url('images/default.jpg');
                }
              ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card menu-card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
                  <div class="category-badge">
                    <span class="badge bg-info rounded-pill">
                      <i class="bi bi-cup-straw me-1"></i>Minuman
                    </span>
                  </div>
                  <a href="<?= site_url('menu/detail/' . $menu['idMenu']) ?>" class="menu-img-wrapper">
                    <img src="<?= $gambarPath ?>"
                         alt="<?= esc($menu['namaMenu']) ?>"
                         class="card-img-top menu-img">
                  </a>
                  <div class="card-body text-center p-4">
                    <h5 class="fw-bold text-dark mb-2" style="color: var(--text-primary) !important;"><?= esc($menu['namaMenu']) ?></h5>
                    <p class="text-danger fw-semibold fs-5 mb-4" style="color: var(--primary-color) !important;">
                      Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?>
                    </p>

                    <div class="d-flex justify-content-center gap-2">
                      <form class="add-to-cart-form" action="/cart/add" method="post">
                        <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                          🛒 Tambah
                        </button>
                      </form>

                      <form action="/menu/orderNow" method="post">
                        <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                        <button type="submit" class="btn btn-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                          ⚡ Pesan
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-12">
              <p class="text-center text-muted fs-4">Belum ada menu minuman yang tersedia.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===========================
     ⚡ Script AJAX Tambah Keranjang - Ultra Responsive
     =========================== -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const forms = document.querySelectorAll('.add-to-cart-form');

  forms.forEach(form => {
    form.addEventListener('submit', async e => {
      e.preventDefault();
      const formData = new FormData(form);
      const submitBtn = form.querySelector('button[type="submit"]');

      // 🔥 IMMEDIATE VISUAL FEEDBACK - Instant response
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Menambah...';
      submitBtn.disabled = true;
      submitBtn.style.transform = 'scale(0.95)';
      submitBtn.style.opacity = '0.8';

      // 🔥 Animate cart icon immediately
      animateCartIcon();

      try {
        // 🔥 Faster fetch with timeout
        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 3000); // 3 second timeout

        const res = await fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          signal: controller.signal
        });

        clearTimeout(timeoutId);
        const data = await res.json();

        if (data.success) {
          // 🔥 Ultra-fast success feedback
          showToast('✅ Ditambahkan!', false, 1500); // Shorter duration
          updateCartCount(data.count, true); // Animated update

          // 🔥 Success animation on button
          submitBtn.innerHTML = '✅ Berhasil!';
          submitBtn.style.backgroundColor = '#28a745';
          submitBtn.style.transform = 'scale(1.05)';

          // Reset button after success
          setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            submitBtn.style.transform = '';
            submitBtn.style.opacity = '';
            submitBtn.style.backgroundColor = '';
          }, 800);

        } else {
          // 🔥 Fast error feedback
          showToast('⚠️ Gagal menambah.', true, 2000);
          resetButton(submitBtn, originalText);
        }
      } catch (err) {
        console.error(err);
        if (err.name === 'AbortError') {
          showToast('⏱️ Timeout - coba lagi.', true, 2000);
        } else {
          showToast('❌ Koneksi error.', true, 2000);
        }
        resetButton(submitBtn, originalText);
      }
    });
  });

  // 🔥 Ultra-fast toast notification
  function showToast(message, isError = false, duration = 2000) {
    const toast = document.createElement('div');
    toast.textContent = message;
    toast.className = `toast-message ${isError ? 'error' : 'success'}`;
    document.body.appendChild(toast);

    // 🔥 Instant show (no delay)
    setTimeout(() => toast.classList.add('show'), 10);

    // 🔥 Shorter display time
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => toast.remove(), 200);
    }, duration);
  }

  // 🔥 Animated cart count update
  function updateCartCount(count, animate = false) {
    const badge = document.querySelector('.cart-count-ultra');
    if (badge) {
      if (animate) {
        // 🔥 Bounce animation for badge
        badge.style.animation = 'none';
        setTimeout(() => {
          badge.style.animation = 'bounce 0.4s ease';
        }, 10);
      }
      badge.textContent = count;
    }
  }

  // 🔥 Animate cart icon in navbar
  function animateCartIcon() {
    const cartIcon = document.querySelector('.cart-icon-ultra');
    if (cartIcon) {
      cartIcon.style.animation = 'none';
      setTimeout(() => {
        cartIcon.style.animation = 'bounce 0.3s ease';
        cartIcon.style.color = '#28a745'; // Green flash
        setTimeout(() => {
          cartIcon.style.color = ''; // Reset color
        }, 300);
      }, 10);
    }
  }

  // 🔥 Reset button helper
  function resetButton(button, originalText) {
    button.innerHTML = originalText;
    button.disabled = false;
    button.style.transform = '';
    button.style.opacity = '';
    button.style.backgroundColor = '';
  }
});
</script>

<!-- ===========================
     🎨 Style Tambahan
     =========================== -->
<style>
  /* Menu Hero Section */
  .menu-hero-section {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
  }

  .menu-hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
  }

  /* Floating Shapes like Home Page */
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

  .menu-stats {
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

  .hero-menu-image img {
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    max-width: 500px;
    width: 100%;
  }

  /* Category Tabs */
  .category-tabs .nav-pills .nav-link {
    background: white;
    color: #dc3545;
    border: 2px solid #dc3545;
    border-radius: 30px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    margin: 0 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.1);
  }

  .category-tabs .nav-pills .nav-link:hover {
    background: #dc3545;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
  }

  .category-tabs .nav-pills .nav-link.active {
    background: #dc3545;
    color: white;
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
  }

  /* Menu Cards */
  .menu-card {
    background: #fff;
    transition: all 0.3s ease;
    border-radius: 1.2rem !important;
    position: relative;
    overflow: hidden;
  }

  .menu-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 10px 25px rgba(220, 53, 69, 0.2);
  }

  .category-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 10;
  }

  .category-badge .badge {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
    font-weight: 600;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  }

  .menu-img-wrapper {
    display: block;
    position: relative;
    overflow: hidden;
    height: 320px;
    cursor: pointer;
  }

  .menu-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .menu-card:hover .menu-img {
    transform: scale(1.12);
  }

  .btn-danger, .btn-outline-danger {
    transition: all 0.3s ease;
  }

  .btn-danger:hover {
    background-color: #b81f2c;
    transform: scale(1.05);
  }

  .btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
    transform: scale(1.05);
  }

  .d-flex form {
    flex: 1;
  }

  body {
    background-color: var(--light-bg);
  }

  /* Dark Mode Body */
  [data-theme="dark"] body {
    background-color: var(--light-bg);
  }

  /* Category Tabs - Dark Mode */
  [data-theme="dark"] .category-tabs .nav-pills .nav-link {
    background: var(--card-bg);
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
  }

  [data-theme="dark"] .category-tabs .nav-pills .nav-link:hover,
  [data-theme="dark"] .category-tabs .nav-pills .nav-link.active {
    background: var(--primary-color);
    color: white;
  }

  /* Menu Cards - Dark Mode */
  [data-theme="dark"] .menu-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
  }

  [data-theme="dark"] .menu-card:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
  }

  /* Toast Notification */
  .toast-message {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: var(--success-color);
    color: #fff;
    padding: 12px 20px;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
    z-index: 9999;
  }
  .toast-message.error {
    background: var(--danger-color);
  }
  .toast-message.show {
    opacity: 1;
    transform: translateY(0);
  }

  /* Dark Mode Toast */
  [data-theme="dark"] .toast-message {
    box-shadow: 0 5px 15px rgba(0,0,0,0.5);
  }

  /* Enhanced Dark Mode Styles for Menu Page */
  [data-theme="dark"] .menu-hero-section {
    background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
  }

  [data-theme="dark"] .hero-bg-pattern {
    background-image: radial-gradient(circle at 20% 80%, rgba(231, 76, 60, 0.05) 0%, transparent 50%),
                      radial-gradient(circle at 80% 20%, rgba(243, 156, 18, 0.05) 0%, transparent 50%);
  }

  [data-theme="dark"] .hero-content-wrapper h1 {
    color: var(--text-primary) !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
  }

  [data-theme="dark"] .hero-content-wrapper p {
    color: var(--text-secondary) !important;
  }

  [data-theme="dark"] .menu-stats .stat-item {
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

  [data-theme="dark"] .image-glow {
    background: linear-gradient(45deg, rgba(231, 76, 60, 0.1), rgba(243, 156, 18, 0.1)) !important;
  }

  [data-theme="dark"] .hero-menu-image img {
    border-color: rgba(231, 76, 60, 0.3) !important;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(231, 76, 60, 0.1);
  }

  [data-theme="dark"] .floating-decorations .badge {
    background: linear-gradient(135deg, var(--card-bg), rgba(45, 45, 45, 0.9)) !important;
    color: var(--text-primary) !important;
    border: 1px solid rgba(231, 76, 60, 0.2) !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
  }

  [data-theme="dark"] .menu-categories-section {
    background: linear-gradient(135deg, var(--light-bg) 0%, rgba(25, 25, 25, 0.8) 100%);
  }

  [data-theme="dark"] .category-tabs .nav-pills .nav-link {
    background: linear-gradient(135deg, var(--card-bg), rgba(40, 40, 40, 0.9));
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.1);
    transition: all 0.3s ease;
  }

  [data-theme="dark"] .category-tabs .nav-pills .nav-link:hover,
  [data-theme="dark"] .category-tabs .nav-pills .nav-link.active {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
  }

  [data-theme="dark"] .menu-card {
    background: linear-gradient(135deg, var(--card-bg) 0%, rgba(40, 40, 40, 0.9) 100%);
    border: 1px solid rgba(231, 76, 60, 0.15);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
  }

  [data-theme="dark"] .menu-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4), 0 0 25px rgba(231, 76, 60, 0.1);
  }

  [data-theme="dark"] .menu-card .card-title {
    color: var(--text-primary) !important;
  }

  [data-theme="dark"] .menu-card .card-text {
    color: var(--text-secondary) !important;
  }

  [data-theme="dark"] .menu-card .text-muted {
    color: var(--text-secondary) !important;
  }

  [data-theme="dark"] .category-badge .badge {
    background: linear-gradient(135deg, var(--success-color), rgba(39, 174, 96, 0.8)) !important;
    box-shadow: 0 2px 6px rgba(39, 174, 96, 0.2);
  }

  [data-theme="dark"] .category-badge .badge.bg-info {
    background: linear-gradient(135deg, var(--info-color), rgba(52, 152, 219, 0.8)) !important;
    box-shadow: 0 2px 6px rgba(52, 152, 219, 0.2);
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

  /* Text Shadow for Better Readability in Dark Mode */
  [data-theme="dark"] .text-shadow-lg {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7) !important;
  }



  /* Improved Menu Card Image Effects in Dark Mode */
  [data-theme="dark"] .menu-card:hover .menu-img {
    transform: scale(1.08);
    filter: brightness(1.1) contrast(1.1);
  }

  /* Better Category Tab Transitions */
  [data-theme="dark"] .category-tabs .nav-pills .nav-link {
    position: relative;
    overflow: hidden;
  }

  [data-theme="dark"] .category-tabs .nav-pills .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(231, 76, 60, 0.1), transparent);
    transition: left 0.5s;
  }

  [data-theme="dark"] .category-tabs .nav-pills .nav-link:hover::before {
    left: 100%;
  }

  /* Enhanced Button Hover Effects in Dark Mode */
  [data-theme="dark"] .btn-danger:hover,
  [data-theme="dark"] .btn-outline-danger:hover {
    filter: drop-shadow(0 0 15px rgba(231, 76, 60, 0.4));
  }

  /* Improved Badge Glow Effects */
  [data-theme="dark"] .category-badge .badge {
    position: relative;
  }

  [data-theme="dark"] .category-badge .badge::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: inherit;
    border-radius: inherit;
    filter: blur(4px);
    opacity: 0.3;
    z-index: -1;
  }

  /* Better Responsive Design for Dark Mode */
  @media (max-width: 768px) {
    [data-theme="dark"] .menu-hero-section {
      padding: 3rem 0;
    }

    [data-theme="dark"] .hero-content-wrapper h1 {
      font-size: 2.5rem;
    }

    [data-theme="dark"] .menu-stats {
      padding: 1rem;
    }

    [data-theme="dark"] .floating-decorations {
      display: none;
    }
  }

  @media (max-width: 576px) {
    [data-theme="dark"] .hero-content-wrapper h1 {
      font-size: 2rem;
    }

    [data-theme="dark"] .stat-item .stat-number {
      font-size: 2rem;
    }
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .menu-hero-section {
      text-align: center;
    }

    .menu-stats {
      margin-top: 2rem;
    }

    .menu-stats .d-flex {
      flex-direction: column;
      gap: 1rem;
    }

    .category-tabs .nav-pills {
      flex-direction: column;
      gap: 0.5rem;
    }

    .category-tabs .nav-pills .nav-link {
      margin: 0.25rem 0;
    }

    .hero-menu-image img {
      max-width: 300px;
    }
  }

  @media (max-width: 576px) {
    .display-4 {
      font-size: 2rem;
    }

    .menu-stats {
      padding: 1rem;
    }

    .stat-item .stat-number {
      font-size: 2rem;
    }
  }
</style>

<?= $this->endSection() ?>
