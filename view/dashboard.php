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
