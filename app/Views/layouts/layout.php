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
    /* Navbar Custom */
    .navbar-custom { 
      background-color: #c82333;
    }
    .navbar-custom .nav-link, 
    .navbar-custom .navbar-brand { 
      color: #fff !important; 
    }
    .navbar-custom .nav-link:hover { 
      color: #ffd6d6 !important; 
    }
    .logo-yokuwi { 
      height: 48px; 
      width: auto; 
      object-fit: contain; 
    }
    @media (max-width: 768px) { 
      .logo-yokuwi { 
        height: 42px; 
      } 
    }

    /* Ikon Keranjang */
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

    /* Styling untuk Body */
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    /* Footer Styling */
    footer {
      background-color: #f8f9fa;
      color: #6c757d;
      padding: 20px 0;
    }

    /* Styling untuk ikon profil di navbar */
    .navbar .nav-item .bi-person-circle {
      font-size: 1.5rem;
      transition: transform 0.3s ease;
    }

    .navbar .nav-item .bi-person-circle:hover {
      transform: scale(1.1);
    }

    /* Styling untuk menu samping (offcanvas) */
    .offcanvas-custom {
      width: 200px; /* Lebar lebih kecil untuk desain minimalis */
      background-color: #ffffff; /* Latar belakang terang */
      color: #333; /* Teks gelap untuk kontras yang lebih baik */
      box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1); /* Bayangan halus */
      border-radius: 10px 0 0 10px; /* Sudut melengkung */
      transition: transform 0.3s ease-in-out;
      max-height: 45vh; /* Batasi tinggi hanya 60% dari tinggi layar */
      overflow-y: auto; /* Menambahkan scroll jika konten lebih tinggi */
      padding: 20px 0; /* Padding lebih besar */
    }

    .offcanvas-header {
      background-color: #dc3545;
      color: white;
      font-size: 1.4rem;
      font-weight: 600;
      border-bottom: 1px solid #ddd;
      padding: 10px;
    }

    .offcanvas-body a {
      font-size: 1.2rem;
      color: #333;
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 12px 15px;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-bottom: 1px solid #ddd; /* Sekat tipis di bawah setiap item menu */
    }

    .offcanvas-body a:hover {
      background-color: #f1f1f1;
      color: #dc3545;
    }

    .offcanvas-body a i {
      margin-right: 10px;
      font-size: 1.2rem;
    }

    /* Animasi untuk menu samping (offcanvas) */
    .offcanvas {
      animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
      from {
        transform: translateX(100%);
      }
      to {
        transform: translateX(0);
      }
    }

    /* Styling untuk tombol close offcanvas */
    .btn-close {
      color: #333;
      font-size: 1.5rem;
      opacity: 0.6;
    }
    .btn-close:hover {
      opacity: 1;
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

<!-- Navbar dengan Ikon Profil -->
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
              Hi, <?= esc($username) ?> <i class="bi bi-person-circle"></i>
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

<!-- Offcanvas Menu untuk Menu Samping -->
<div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="menuSamping">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Hi, <?= esc($username) ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <!-- Selalu muncul -->
      <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('home') ?>"><i class="bi bi-house-door"></i> HOME</a></li>

      <?php if ($isLoggedIn): ?>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('menu') ?>"><i class="bi bi-list-ul"></i> MENU</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('admin/kelola-menu') ?>"><i class="bi bi-gear"></i> KELOLA MENU</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('daftar_login') ?>"><i class="bi bi-person-check"></i> INFORMASI AKUN</a></li>
        <li class="nav-item"><a class="nav-link text-dark text-danger fw-semibold" href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> LOGOUT</a></li>
      <?php else: ?>  
        <li class="nav-item"><a class="nav-link text-dark" href="<?= site_url('login') ?>"><i class="bi bi-box-arrow-in-right"></i> LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<main>
  <?= $this->renderSection('content') ?>
</main>

<!-- Footer Section (Hanya Satu Footer di Bawah Konten) -->
<footer class="text-center py-3 mt-5 bg-light border-top">
  <p class="mb-0 text-muted">&copy; <?= date('Y') ?> Warung Makan Yokuwi</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
