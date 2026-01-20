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
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM produk"
        );
        return mysqli_fetch_assoc($result)['total'];
    }

    public function getTotalKategori()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM kategori"
        );
        return mysqli_fetch_assoc($result)['total'];
    }

    public function getTotalBrand()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM brand"
        );
        return mysqli_fetch_assoc($result)['total'];
    }

    public function getTotalSatuan()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM satuan"
        );
        return mysqli_fetch_assoc($result)['total'];
    }

    public function getTotalStok()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT SUM(jumlah_stok) AS total FROM stok"
        );
        return mysqli_fetch_assoc($result)['total'];
    }
    public function getStokActivity()
    {
        $q = mysqli_query(
            $this->conn,
            "SELECT SUM(jumlah_stok) AS total FROM stok"
        );

        $r = mysqli_fetch_assoc($q);
        return $r['total'] ?? 0;
    }
}
