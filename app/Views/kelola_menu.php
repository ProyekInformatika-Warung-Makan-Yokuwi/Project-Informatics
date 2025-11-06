<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5 bg-light">
  <div class="container">
    <h1 class="fw-bold text-danger mb-4 text-center">Kelola Menu</h1>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="mb-3 text-end">
  <a href="<?= site_url('admin/kelola-menu/tambah') ?>" class="btn btn-success">➕ Tambah Menu</a>
</div>

    <div class="table-responsive shadow rounded">
      <table class="table table-striped align-middle text-center">
        <thead class="table-danger">
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($menuList)): ?>
            <?php $no = 1; foreach ($menuList as $menu): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img src="<?= base_url('images/' . esc($menu['gambar'] ?? 'default.jpg')) ?>" style="width:80px; height:80px; object-fit:cover" class="rounded"></td>
                <td><?= esc($menu['namaMenu']) ?></td>
                <td>Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></td>
                <td>
                  <a href="<?= site_url('admin/kelola-menu/edit/' . $menu['idMenu']) ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                  <a href="<?= site_url('admin/kelola-menu/delete/' . $menu['idMenu']) ?>" onclick="return confirm('Yakin ingin menghapus menu ini?')" class="btn btn-danger btn-sm">🗑️ Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="5" class="text-muted">Belum ada data menu.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
