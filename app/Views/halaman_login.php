<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Yokuwi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-4" style="width: 380px;">
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

</body>
</html>
