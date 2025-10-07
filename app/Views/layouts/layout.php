<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Yokuwi') ?></title>
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
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="<?= base_url('images/logo.png') ?>" alt="Logo Yokuwi" class="logo-yokuwi">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/menu">Testttt</a></li>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
