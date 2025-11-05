<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Yokuwi</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Navbar dan header konsisten */
    .navbar-custom {
      background-color: #c82333;
      padding-top: 0.6rem;
      padding-bottom: 0.6rem;
    }

    .navbar-brand {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      text-decoration: none;
      color: #fff !important;
    }

    .navbar-brand span {
      display: block;
      line-height: 1.1;
    }

    .navbar-brand .sub {
      color: #FFDD00;
      font-size: 0.9rem;
      font-weight: 700;
    }

    .navbar-brand .main {
      font-size: 1.4rem;
      font-weight: 800;
      letter-spacing: 0.5px;
    }

    /* Body & card */
    body {
      background-color: #f8f9fa;
    }

    .login-card {
      width: 380px;
      margin: 80px auto;
      border-radius: 10px;
    }

    .btn-danger {
      background-color: #C6202D;
      border: none;
    }

    .btn-danger:hover {
      background-color: #A81C26;
    }
  </style>
</head>
<body>

  <!-- Header menggunakan gaya navbar Bootstrap -->
  <nav class="navbar navbar-custom">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <span class="sub">WARUNG MAKAN</span>
        <span class="main">YOKUWI JOGJA</span>
      </a>
    </div>
  </nav>

  <!-- Form login -->
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
