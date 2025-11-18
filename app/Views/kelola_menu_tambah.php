<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5 bg-light">
  <div class="container">
    <h1 class="fw-bold text-danger mb-4 text-center">Tambah Menu Baru</h1>

    <form action="<?= site_url('admin/kelola-menu/simpan') ?>" method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
      <div class="mb-3">
        <label class="form-label">Nama Menu</label>
        <input type="text" name="namaMenu" class="form-control" placeholder="Contoh: Es Coklat" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga Menu</label>
        <input type="number" name="hargaMenu" class="form-control" placeholder="Contoh: 12000" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Gambar Menu</label>
        <input type="file" name="gambar" class="form-control">
      </div> 

      <button type="submit" class="btn btn-danger">➕ Tambah Menu</button>
      <a href="<?= site_url('admin/kelola-menu') ?>" class="btn btn-secondary ms-2">Kembali</a>
    </form>
  </div>
</section>

<?= $this->endSection() ?>
