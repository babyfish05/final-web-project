<?php

require_once __DIR__ . '/../config/Database.php';

class DashboardModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn;
    }

    // Hitung total mahasiswa
    public function getTotalMahasiswa() {
        $query = "SELECT COUNT(*) as total FROM mahasiswa";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // Hitung total dosen
    public function getTotalDosen() {
        $query = "SELECT COUNT(*) as total FROM dosen";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // Hitung total mata kuliah
    public function getTotalMatakuliah() {
        $query = "SELECT COUNT(*) as total FROM matakuliah";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
=======

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
