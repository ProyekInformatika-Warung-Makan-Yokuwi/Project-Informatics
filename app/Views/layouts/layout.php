<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Yokuwi') ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .navbar-custom { background-color: #c82333; }
    .navbar-custom .nav-link, 
    .navbar-custom .navbar-brand { color: #fff !important; }
    .navbar-custom .nav-link:hover { color: #ffd6d6 !important; }
    .logo-yokuwi { height: 48px; width: auto; object-fit: contain; }
    @media (max-width: 768px) { .logo-yokuwi { height: 42px; } }

    /* Ikon keranjang */
    .cart-icon {
      position: relative;
      font-size: 1.6rem;
      color: #fff;
      transition: 0.3s ease;
    }
    .cart-icon:hover {
      color: #ffefef;
      transform: scale(1.1);
    }

    .cart-count {
      position: absolute;
      top: -8px;
      right: -10px;
      background-color: #ffc107;
      color: #000;
      font-weight: 700;
      border-radius: 50%;
      padding: 2px 7px;
      font-size: 0.8rem;
      box-shadow: 0 0 5px rgba(0,0,0,0.3);
    }

    .navbar-toggler { border-color: rgba(255,255,255,0.5); }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255,255,255,1)' stroke-linecap='round' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
  </style>
</head>
<body>

<?php
$session = session();
$cart = $session->get('cart') ?? [];
$cartCount = array_sum(array_column($cart, 'qty'));
$isLoggedIn = $session->get('isLoggedIn');
$username = $session->get('username');
$role = $session->get('role');
?>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/') ?>">
      <img src="<?= base_url('images/logo.png') ?>" alt="Logo Yokuwi" class="logo-yokuwi">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuSamping">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- Ikon keranjang hanya muncul setelah login -->
        <?php if ($isLoggedIn): ?>
        <li class="nav-item me-3">
          <a href="/cart" class="position-relative">
            <i class="bi bi-cart3 cart-icon"></i>
            <?php if ($cartCount > 0): ?>
              <span class="cart-count"><?= $cartCount ?></span>
            <?php endif; ?>
          </a>
        </li>
        <?php endif; ?>

        <?php if ($isLoggedIn): ?>
          <li class="nav-item">
            <a class="nav-link fw-semibold text-white" href="#" data-bs-toggle="offcanvas" data-bs-target="#menuSamping">
              <?= esc($username) ?> <i class="bi bi-person-circle"></i>
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link fw-semibold text-white" href="<?= site_url('login') ?>">LOGIN</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="menuSamping">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <!-- Selalu muncul -->
      <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('home') ?>">HOME</a></li>

      <?php if ($isLoggedIn): ?>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('menu') ?>">MENU</a></li>
        <li class="nav-item">
  <a class="nav-link text-dark" href="<?= site_url('admin/kelola-menu') ?>">KELOLA MENU</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('daftar_login') ?>">INFORMASI AKUN</a></li>
        <li class="nav-item"><a class="nav-link text-dark text-danger fw-semibold" href="<?= site_url('logout') ?>">LOGOUT</a></li>

      <?php else: ?>  
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('login') ?>">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<main>
  <?= $this->renderSection('content') ?>
</main>

<footer class="text-center py-3 mt-5 bg-light border-top">
  <p class="mb-0 text-muted">&copy; <?= date('Y') ?> Warung Makan Yokuwi</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
