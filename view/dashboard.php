<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .navbar {
            background: #007bff;
            color: white;
            padding: 15px;
        }
        .navbar a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
        }
        .container {
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="navbar">
    Dashboard
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <div class="card">
        <h2>Selamat Datang 👋</h2>
        
        <p>Halo <b><?= $username; ?></b></p>
    </div>

    <div class="card">
        <h3>Informasi Login</h3>
        <p>Tanggal: <?= $tanggal; ?></p>
        <p>Jam: <?= $jam; ?></p>
        <p>Status: Login</p>
    </div>
</div>

</body>
</html>
=======
<?php require_once __DIR__ . '/partials/sidebar.php'; ?>
<?php require_once __DIR__ . '/partials/header.php'; ?>

<link rel="stylesheet" href="/final-web-project/style/main.css">
<link rel="stylesheet" href="/final-web-project/style/dasboard.css">

<main>
   <div class="text">
    <p>Dasboard</p>
   </div>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('d/m/Y');
    $hari = date('l');
    ?>
    <div class="dashboard-header">
        <span class="date">Date: <?= $tanggal ?></span>
        <span class="day"><?= $hari ?></span>
    </div>
    <div class="card-container">
        <div class="card">
            <h3>Total Produk</h3>
            <strong><?= $data['totalProduk'] ?></strong>
        </div>
        <div class="card">
            <h3>Total Kategori</h3>
            <strong><?= $data['totalKategori'] ?></strong>
        </div>
        <div class="card">
            <h3>Total Brand</h3>
            <strong><?= $data['totalBrand'] ?></strong>
        </div>
        <div class="card">
            <h3>Total Satuan</h3>
            <strong><?= $data['totalSatuan'] ?></strong>
        </div>
        <div class="card">
            <h3>Total Stok</h3>
            <strong><?= $data['stokActivity'] ?></strong>
        </div>
    </div>

    <h2>Activity Stok Produk</h2>
    <table>
        <thead>
            <tr>
                <th>Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total</td>
                <td><?= $data['stokActivity'] ?></td>
            </tr>
        </tbody>
    </table>
</main>

<!-- <?php require_once __DIR__ . '/partials/footer.php'; ?> -->
>>>>>>> 1baf2f33f243af62787df0e1f721385b81491561
