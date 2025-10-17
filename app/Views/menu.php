<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5" style="background: #fff5f5;">
  <div class="container">
    <h1 class="fw-bold text-center text-danger mb-5">🍽️ Daftar Menu Yokuwi 🍛</h1>

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
              <div class="menu-img-wrapper">
                <img src="<?= $gambarPath ?>" 
                     alt="<?= esc($menu['namaMenu']) ?>" 
                     class="card-img-top menu-img">
              </div>
              <div class="card-body text-center p-4">
                <h5 class="fw-bold text-dark mb-2"><?= esc($menu['namaMenu']) ?></h5>
                <p class="text-danger fw-semibold fs-5 mb-4">
                  Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?>
                </p>

                <div class="d-flex justify-content-center gap-2">
                  <!-- Tombol Tambah ke Keranjang -->
                  <form action="/cart/add" method="post">
                    <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
                    <button type="submit" class="btn btn-outline-danger rounded-pill px-3 py-2 fw-semibold shadow-sm w-100">
                      🛒 Tambah
                    </button>
                  </form>

                  <!-- Tombol Pesan Langsung -->
                  <form action="/order/checkout" method="post">
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
    position: relative;
    overflow: hidden;
    height: 320px;
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
</style>

<?= $this->endSection() ?>
