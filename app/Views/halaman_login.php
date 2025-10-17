<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Yokuwi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang abu-abu muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            width: 380px;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #c82333; /* Aksen warna merah Yokuwi */
        }
        .login-container h2 {
            margin-bottom: 25px;
            font-weight: bold;
            color: #333;
        }
        .form-control {
            height: 50px;
            margin-bottom: 15px;
        }
        .btn-login {
            height: 50px;
            font-weight: bold;
            background-color: #c82333;
            border: none;
        }
        .btn-login:hover {
            background-color: #a21b29;
        }
    </style>
</head>
<body>

    <div class="login-container text-center">
        <h2>Anda Masuk Sebagai Admin</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('login/process') ?>" method="POST" class="mt-4">
            <?= csrf_field() ?>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-login">MASUK</button>
        </form>
    </div>

</body>
</html>