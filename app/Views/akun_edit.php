<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="text-danger fw-bold mb-4">Edit Akun</h2>

  <form method="post" action="<?= site_url('admin/update-akun/' . $akun['id']) ?>">

    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= esc($akun['nama']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?= esc($akun['email']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Password (opsional)</label>
      <input type="password" name="password" class="form-control">
      <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control">
        <option value="admin" <?= $akun['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="pemilik" <?= $akun['role'] == 'pemilik' ? 'selected' : '' ?>>Pemilik</option>
      </select>
    </div>

    <button class="btn btn-danger">Update</button>

  </form>
</div>

<?= $this->endSection() ?>
