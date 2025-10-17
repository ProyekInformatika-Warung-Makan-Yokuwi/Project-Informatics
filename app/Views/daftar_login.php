<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<?php
$accounts = [
    "alvinwijaya@gmail.com",
    "deakkkk@gmail.com",
    "dimassimamora@gmail.com",
    "ardididi@gmail.com",
    "fanidarat@gmail.com"
];
?>

<div class="container py-5">
  <div class="card mx-auto shadow-sm" style="max-width: 400px; border-radius: 10px;">
    <div class="card-body">
      <h4 class="text-center mb-4 text-danger">Daftar Akun</h4>
      <div class="list-group">
        <?php foreach ($accounts as $email): ?>
          <a href="<?= base_url('login?email=' . urlencode($email)) ?>" class="list-group-item list-group-item-action d-flex align-items-center">
            <span class="me-2">👤</span>
            <?= htmlspecialchars($email) ?>
          </a>
        <?php endforeach; ?>
      </div>
      <button class="btn btn-danger w-100 mt-3" onclick="window.location.href='<?= base_url('register') ?>'">
        Tambah Akun
      </button>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
