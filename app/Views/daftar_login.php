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
      <table class="table table-striped table-bordered text-center shadow-sm">
        <thead class="table-danger">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
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
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center">Tidak ada data akun admin</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
