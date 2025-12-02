<?php $this->setVar('title', 'Login - Yokuwi'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<style>
/* Custom styles for login page */
.login-container {
  min-height: calc(100vh - 200px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 0;
}

.login-card {
  width: 100%;
  max-width: 380px;
  border-radius: 10px;
  box-shadow: var(--shadow-lg);
  border: none;
}

.btn-danger {
  background-color: #C6202D;
  border: none;
}

.btn-danger:hover {
  background-color: #A81C26;
}
</style>

<div class="login-container">
  <div class="card shadow p-4 login-card">
    <h3 class="text-center text-danger fw-bold mb-3">Login Admin</h3>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('login/process') ?>" method="post">
      <?= csrf_field() ?>

      <div class="form-floating mb-3">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
        <label for="email">Email</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <button type="submit" class="btn btn-danger w-100 fw-bold">MASUK</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
