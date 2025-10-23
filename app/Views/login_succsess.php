<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .success-box {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            border-top: 5px solid #198754;
        }
        h2 {
            color: #198754;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <h2>✅ Login Berhasil</h2>
        <p>Selamat datang, <strong><?= esc($username) ?></strong>!</p>
        <p>Anda login sebagai <strong><?= esc($role) ?></strong>.</p>
        <a href="<?= base_url('/') ?>" class="btn btn-success mt-3">Kembali ke Beranda</a>
    </div>
</body>
</html>
