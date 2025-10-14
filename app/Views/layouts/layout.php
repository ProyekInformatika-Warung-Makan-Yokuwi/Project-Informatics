<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Yokuwi') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-custom { background-color: #c82333; }
    .navbar-custom .nav-link, .navbar-custom .navbar-brand { color: #fff !important; }
    .navbar-custom .nav-link:hover { color: #ffd6d6 !important; }
    .logo-yokuwi { height: 48px; width: auto; object-fit: contain; }
    @media (max-width: 768px) { .logo-yokuwi { height: 42px; } }
    .navbar-custom .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="<?= base_url('images/logo.png') ?>" alt="Logo Yokuwi" class="logo-yokuwi">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuSamping">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#menuSamping">LOGIN</a>
            </li>
        </ul>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="menuSamping">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('home') ?>">HOME</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('daftar_login') ?>">INFORMASI AKUN</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('kelola-menu') ?>">KELOLA MENU</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('logout') ?>">LOGOUT</a></li>
    </ul>
  </div>
</div>

<main>
  <?= $this->renderSection('content') ?>
</main>

<footer class="text-center py-3 mt-5 bg-light border-top">
  <p class="mb-0 text-muted">&copy; <?= date('Y') ?> Warung Makan Yokuwi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>