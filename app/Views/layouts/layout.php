<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Yokuwi') ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
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

    /* Tambahan agar ikon toggler terlihat */
    .navbar-toggler {
      border-color: rgba(255,255,255,0.5);
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,0.8%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/') ?>">
      <img src="<?= base_url('images/logo.png') ?>" alt="Logo Yokuwi" class="logo-yokuwi">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('menu') ?>">Menu</a>
        </li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <a class="btn btn-outline-light btn-sm" href="<?= base_url('login') ?>">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

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
