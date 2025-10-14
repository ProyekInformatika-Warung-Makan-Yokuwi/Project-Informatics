<?php
$role = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : 'pelanggan';

// Tentukan judul berdasarkan peran yang dipilih
if ($role === 'admin') {
    $judul = "Login Admin/Pegawai";
    $target_role = "admin";
} else {
    $judul = "Login Pelanggan";
    $target_role = "pelanggan";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $judul; ?></title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #C0392B; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo strtoupper($judul); ?></h2>
        
        <?php 
        if (isset($_GET['error'])) {
            echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        
        <form action="login_process.php" method="POST">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Masukkan Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Masukkan Password" name="password" required>
            
            <input type="hidden" name="target_role" value="<?php echo $target_role; ?>">
                
            <button type="submit">MASUK</button>
        </form>
    </div>
</body>
</html>