<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Warung Makan Yokuwi Jogja</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Mengatur background dengan gambar */
            background-image: url('<?php echo base_url('assets/img/ayam.jpg'); ?>'); 
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Agar full screen */
            position: relative;
        }

        /* Overlay gelap untuk membuat teks lebih terbaca */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4); /* Transparansi 40% */
        }

        /* Bagian Header Merah */
        .header {
            width: 100%;
            padding: 15px 0;
            background-color: #C0392B; /* Merah gelap */
            color: white;
            text-align: left;
            font-size: 1.2em;
            font-weight: bold;
            z-index: 10; /* Pastikan di atas overlay */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            position: fixed; /* Header tetap di atas */
        }
        .header h1 {
            margin: 0 20px;
            font-size: 1.2em;
        }

        /* Kotak Popup Selamat Datang */
        .welcome-box {
            background-color: rgba(230, 230, 230, 0.8); /* Abu-abu semi-transparan */
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 80%; /* Lebar kotak */
            max-width: 350px;
            margin-top: 25vh; /* Posisikan ke tengah/bawah sedikit dari atas */
            z-index: 20;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            border: 2px solid #555;
        }
        
        /* Teks Selamat Datang */
        .welcome-box h2 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 25px;
            text-shadow: 1px 1px 2px white;
        }

        /* Gaya Tombol */
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            color: white;
            font-size: 1.1em;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .btn-masuk {
            background-color: #C0392B; /* Merah untuk Masuk */
            /* Gradien sesuai gambar */
            background-image: linear-gradient(to top, #A93226, #E74C3C); 
        }

        .btn-admin {
            background-color: #A93226; /* Merah yang sedikit lebih gelap untuk Admin */
            /* Gradien sesuai gambar */
            background-image: linear-gradient(to top, #922B21, #C0392B);
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <h1>WARUNG MAKAN YOKUWI JOGJA</h1>
    </div>

    <div class="welcome-box">
        <h2>SELAMAT DATANG</h2>
        
        <a href="<?php echo base_url('home'); ?>" class="btn btn-masuk">MASUK</a>
        
        <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-admin">AS ADMIN</a>
    </div>

</body>
</html>