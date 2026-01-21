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
    }
}
