<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5" style="background: #fff5f5;">
  <div class="container">
    <h1 class="fw-bold text-center text-danger mb-5">Daftar Menu Yokuwi</h1>

    <div class="row g-4 justify-content-center">
      <?php if (!empty($menuList) && is_array($menuList)): ?>
        <?php foreach ($menuList as $menu): ?>
          <?php
            $gambarPath = base_url('images/' . esc($menu['gambar']));
            $fullPath = FCPATH . 'images/' . $menu['gambar'];
            if (!file_exists($fullPath) || empty($menu['gambar'])) {
              $gambarPath = base_url('images/default.jpg');
            }
          ?>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card menu-card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
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
        <p class="text-center text-muted">Belum ada menu yang tersedia.</p>
      <?php endif; ?>
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
    const badge = document.querySelector('#cart-count');
    if (badge) badge.textContent = count;
  }
});
</script>

<!-- ===========================
     🎨 Style Tambahan
     =========================== -->
<style>
  .menu-card {
    background: #fff;
    transition: all 0.3s ease;
    border-radius: 1.2rem !important;
  }

  .menu-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 10px 25px rgba(220, 53, 69, 0.2);
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
</style>

<?= $this->endSection() ?>
