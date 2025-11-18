<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="text-danger fw-bold mb-4">Tambah Akun Baru</h2>

  <form method="post" action="<?= site_url('admin/simpan-akun') ?>">

    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control">
        <option value="admin">Admin</option>
        <option value="pemilik">Pemilik</option>
      </select>
    </div>

    <button class="btn btn-danger">Simpan</button>

  </form>
</div>

<?= $this->endSection() ?>
