<?php
require_once "config/Database.php";

class ProdukModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAll() {
        $sql = "SELECT produk.*, brand.nama_brand
                FROM produk
                JOIN brand ON produk.id_brand = brand.id_brand
                ORDER BY id_produk DESC";
        return $this->conn->query($sql);
    }

    public function getBrand() {
        return $this->conn->query("SELECT * FROM brand");
    }

    public function insert($nama, $harga, $id_brand) {
        $sql = "INSERT INTO produk (nama_produk, harga, id_brand)
                VALUES (:nama, :harga, :id_brand)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':id_brand', $id_brand);
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM produk WHERE id_produk = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
