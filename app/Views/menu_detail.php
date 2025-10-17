<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<?php
  $gambarPath = base_url('images/' . esc($menu['gambar']));
  $fullPath = FCPATH . 'images/' . $menu['gambar'];
  if (!file_exists($fullPath) || empty($menu['gambar'])) {
    $gambarPath = base_url('images/default.jpg');
  }
?>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <div class="rounded-4 overflow-hidden shadow-sm">
          <img src="<?= $gambarPath ?>" alt="<?= esc($menu['namaMenu']) ?>" class="img-fluid" style="object-fit: cover;">
        </div>
      </div>
      <div class="col-md-6">
        <h1 class="fw-bold text-danger mb-3"><?= esc($menu['namaMenu']) ?></h1>
        <p class="text-muted fs-5 mb-4">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel nisi vitae turpis tempus egestas. 
          Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
          Curabitur tincidunt libero nec tortor facilisis, nec blandit erat efficitur.
        </p>
        <h4 class="fw-semibold text-dark mb-4">
          Harga: <span class="text-danger fw-bold">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></span>
        </h4>

        <div class="d-flex gap-3">
          <!-- Tombol Tambah ke Keranjang -->
          <form action="/cart/add" method="post">
            <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
            <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2 fw-semibold shadow-sm">
              🛒 Tambah ke Keranjang
            </button>
          </form>

          <!-- ✅ Tombol Pesan Sekarang langsung ke checkout -->
          <form action="/menu/orderNow" method="post">
            <input type="hidden" name="idMenu" value="<?= $menu['idMenu'] ?>">
            <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 fw-semibold shadow-sm">
              ⚡ Pesan Sekarang
            </button>
          </form>
        </div>

        <a href="<?= site_url('menu') ?>" class="d-block mt-4 text-decoration-none text-danger fw-semibold">
          ← Kembali ke daftar menu
        </a>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
