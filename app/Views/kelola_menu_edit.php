<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5 bg-light">
  <div class="container">
    <h1 class="fw-bold text-danger mb-4 text-center">Edit Menu</h1>

    <form action="<?= site_url('admin/kelola-menu/update/' . $menu['idMenu']) ?>" method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
      <div class="mb-3">
        <label class="form-label">Nama Menu</label>
        <input type="text" name="namaMenu" value="<?= esc($menu['namaMenu']) ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga Menu</label>
        <input type="number" name="hargaMenu" value="<?= esc($menu['hargaMenu']) ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Gambar Menu</label><br>
        <img src="<?= base_url('images/' . esc($menu['gambar'] ?? 'default.jpg')) ?>" class="rounded shadow-sm mb-3" style="width:120px; height:120px; object-fit:cover;">
        <input type="file" name="gambar" class="form-control">
      </div>

      <button type="submit" class="btn btn-danger">💾 Simpan Perubahan</button>
      <a href="<?= site_url('admin/kelola-menu') ?>" class="btn btn-secondary ms-2">Kembali</a>
    </form>
  </div>
</section>

<?= $this->endSection() ?>
