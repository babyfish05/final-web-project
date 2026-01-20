<?php
session_start();

// simulasi login
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "User Admin";
}

$username = $_SESSION['username'];

// data dashboard
$totalProduk   = 35;
$totalSatuan   = 5;
$totalBrand    = 6;
$totalKategori = 5;

$tanggal = "10/10/2026";
$hari    = "Monday";

// stok activity
$stok = [
    "Pcs"   => 12,
    "Box"   => 8,
    "Botol" => 10
];

// fungsi bar chart ascii
function bar($jumlah) {
    return str_repeat("█", $jumlah);
}

// OUTPUT
echo "============================================================\n";
echo " USER : $username\n";
echo "============================================================\n";
echo " MENU\n";
echo " -----------------------------------------------------------\n";
echo " [*] Dashboard\n";
echo " [ ] Kategori\n";
echo " [ ] Brand\n";
echo " [ ] Produk\n";
echo " [ ] Satuan\n";
echo " [ ] Stok\n";
echo " [ ] Logout\n";
echo "============================================================\n\n";

echo " DASHBOARD\n";
echo " Date : $tanggal | $hari\n";
echo "------------------------------------------------------------\n\n";

echo " [ Total Produk   ] : $totalProduk\n";
echo " [ Total Satuan   ] : $totalSatuan\n";
echo " [ Total Brand    ] : $totalBrand\n";
echo " [ Total Kategori ] : $totalKategori\n";
echo "------------------------------------------------------------\n\n";

echo " ACTIVITY STOK PRODUK\n";
echo "------------------------------------------------------------\n";
foreach ($stok as $nama => $jumlah) {
    echo " $nama  : " . bar($jumlah) . " ($jumlah)\n";
}
echo "------------------------------------------------------------\n";
echo " STATUS : LOGIN\n";
echo "============================================================\n";
