<?php

require_once __DIR__ . '/../database/koneksi.php';

class DashboardModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getTotalProduk()
    {
        $q = mysqli_query($this->conn, "SELECT COUNT(*) AS total FROM produk");
        $r = mysqli_fetch_assoc($q);
        return $r['total'];
    }

    public function getTotalKategori()
    {
        $q = mysqli_query($this->conn, "SELECT COUNT(*) AS total FROM kategori");
        $r = mysqli_fetch_assoc($q);
        return $r['total'];
    }

    public function getTotalBrand()
    {
        $q = mysqli_query($this->conn, "SELECT COUNT(*) AS total FROM brand");
        $r = mysqli_fetch_assoc($q);
        return $r['total'];
    }

    public function getTotalSatuan()
    {
        $q = mysqli_query($this->conn, "SELECT COUNT(*) AS total FROM satuan");
        $r = mysqli_fetch_assoc($q);
        return $r['total'];
    }

    public function getStokActivity()
    {
        $q = mysqli_query($this->conn, "SELECT SUM(jumlah_stok) AS total_stok FROM stok");
        $r = mysqli_fetch_assoc($q);
        return $r['total_stok'];
    }
}
