<?php $this->setVar('title', 'Menu - Warung Makan Yokuwi'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<!-- Hero Section Menu -->
<section class="menu-hero-section py-5" style="background: linear-gradient(135deg, #c82333 0%, #dc3545 50%, #e74c3c 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeIn">Menu Lengkap Yokuwi</h1>
        <p class="lead text-light mb-4 animate__animated animate__fadeIn animate__delay-1s">
          Pilih dari berbagai hidangan lezat dan minuman segar yang siap memanjakan lidah Anda
        </p>
        <div class="menu-stats animate__animated animate__fadeIn animate__delay-2s">
          <div class="d-flex justify-content-center justify-content-lg-start gap-4">
            <div class="stat-item text-center">
              <div class="stat-number text-warning fw-bold fs-3">50+</div>
              <div class="stat-label text-light">Variasi Menu</div>
            </div>
            <div class="stat-item text-center">
              <div class="stat-number text-warning fw-bold fs-3">100%</div>
              <div class="stat-label text-light">Bahan Segar</div>
            </div>
            <div class="stat-item text-center">
              <div class="stat-number text-warning fw-bold fs-3">24/7</div>
              <div class="stat-label text-light">Tersedia</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="hero-menu-image animate__animated animate__fadeIn animate__delay-3s">
          <img src="<?= base_url('images/gambar_tambahan_menu.png') ?>" alt="Menu Yokuwi" class="img-fluid rounded-4 shadow-lg">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Menu Categories Section -->
<section class="menu-categories-section py-5" style="background: #fff5f5;">
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
                    <h5 class="fw-bold text-dark mb-2"><?= esc($menu['namaMenu']) ?></h5>
                    <p class="text-danger fw-semibold fs-5 mb-4">
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
                    <h5 class="fw-bold text-dark mb-2"><?= esc($menu['namaMenu']) ?></h5>
                    <p class="text-danger fw-semibold fs-5 mb-4">
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
                    <h5 class="fw-bold text-dark mb-2"><?= esc($menu['namaMenu']) ?></h5>
                    <p class="text-danger fw-semibold fs-5 mb-4">
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
     ⚡ Script AJAX Tambah Keranjang
     =========================== -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const forms = document.querySelectorAll('.add-to-cart-form');

  forms.forEach(form => {
    form.addEventListener('submit', async e => {
      e.preventDefault();
      const formData = new FormData(form);

      try {
        const res = await fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        const data = await res.json();

        if (data.success) {
          showToast('✅ Berhasil ditambahkan ke keranjang!');
          updateCartCount(data.count); // 🔥 langsung update badge
        } else {
          showToast('⚠️ Gagal menambahkan ke keranjang.', true);
        }
      } catch (err) {
        console.error(err);
        showToast('❌ Terjadi kesalahan koneksi.', true);
      }
    });
  });

  // Fungsi notifikasi toast sederhana
  function showToast(message, isError = false) {
    const toast = document.createElement('div');
    toast.textContent = message;
    toast.className = `toast-message ${isError ? 'error' : 'success'}`;
    document.body.appendChild(toast);
    setTimeout(() => toast.classList.add('show'), 100);
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => toast.remove(), 300);
    }, 2500);
  }

  // 🔥 Update angka badge keranjang di navbar
  function updateCartCount(count) {
    const badge = document.querySelector('.cart-count-ultra');
    if (badge) badge.textContent = count;
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
    background-color: #fffaf9;
  }

  /* Toast Notification */
  .toast-message {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #28a745;
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
    background: #dc3545;
  }
  .toast-message.show {
    opacity: 1;
    transform: translateY(0);
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
