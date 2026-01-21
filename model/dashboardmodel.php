<?php

require_once __DIR__ . '/../database/koneksi.php';

class DashboardModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = koneksi();
    }

    public function getTotalProduk()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM produk"
        );
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public function getTotalKategori()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM kategori"
        );
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public function getTotalBrand()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM brand"
        );
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public function getTotalSatuan()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT COUNT(*) AS total FROM satuan"
        );
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public function getTotalStok()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT SUM(jumlah_stok) AS total FROM stok"
        );
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public function getStokActivity()
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT SUM(jumlah_stok) AS total FROM stok"
        );
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }
}
