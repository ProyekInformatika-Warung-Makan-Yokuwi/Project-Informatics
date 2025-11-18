<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5">
  <div class="container">
    <h1 class="fw-bold text-center text-danger mb-5">Daftar Akun Admin</h1>

    <!-- Menampilkan Akun yang Sedang Login dengan Card Design -->
    <?php if ($isLoggedIn): ?>
      <div class="card mb-4 shadow-sm border-danger">
        <div class="card-header bg-danger text-white">
          <h4 class="fw-bold mb-0">Akun yang Sedang Login</h4>
        </div>
        <div class="card-body">
          <p><strong>Email:</strong> <?= esc($email) ?></p> <!-- Menampilkan email -->
          <p><strong>Role:</strong> <?= esc($role) ?></p> <!-- Menampilkan role -->
        </div>
      </div>
    <?php endif; ?>

    <!-- Tabel Daftar Admin dengan Styling Lebih Rapi -->
    <div class="table-responsive">
      <a href="<?= site_url('admin/tambah-akun') ?>" class="btn btn-danger mb-3">
  <i class="bi bi-person-plus"></i> Tambah Akun
</a>

<table class="table table-striped table-bordered text-center shadow-sm">
  <thead class="table-danger">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Role</th>
      <th>Aksi</th> <!-- Tambah kolom baru -->
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($admins) && is_array($admins)): ?>
      <?php foreach ($admins as $admin): ?>
        <tr>
          <td><?= esc($admin['id']) ?></td>
          <td><?= esc($admin['nama']) ?></td>
          <td><?= esc($admin['email']) ?></td>
          <td><?= esc($admin['role']) ?></td>

          <td>
            <a href="<?= site_url('admin/edit-akun/' . $admin['id']) ?>" class="btn btn-warning btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </a>

            <a href="<?= site_url('admin/hapus-akun/' . $admin['id']) ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin ingin menghapus akun ini?')">
              <i class="bi bi-trash"></i> Hapus
            </a>
          </td>

        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data akun admin</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
