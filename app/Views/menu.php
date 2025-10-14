<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="bg-light py-5">
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
            <div class="card border-0 shadow-sm h-100 rounded-4 menu-card">
              <div class="overflow-hidden rounded-top-4">
                <img src="<?= $gambarPath ?>" 
                     alt="<?= esc($menu['namaMenu']) ?>" 
                     class="card-img-top" 
                     style="height: 300px; object-fit: cover; transition: transform 0.4s ease;">
              </div>
              <div class="card-body text-center">
                <h5 class="fw-bold"><?= esc($menu['namaMenu']) ?></h5>
                <p class="text-danger fw-semibold mb-3">
                  Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?>
                </p>
                <a href="#" class="btn btn-outline-danger rounded-pill px-4">Pesan</a>
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
    transition: all 0.3s ease;
  }

  .menu-card:hover img {
    transform: scale(1.08);
  }

  .menu-card:hover {
    box-shadow: 0 8px 20px rgba(220, 53, 69, 0.2);
    transform: translateY(-5px);
  }
</style>

<?= $this->endSection() ?>
