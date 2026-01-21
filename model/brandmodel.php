<?php
require_once __DIR__ . '/../database/koneksi.php';

class BrandModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = koneksi(); // pakai dari koneksi.php
    }

    public function getAll()
    {
        $result = $this->conn->query(
            "SELECT * FROM brand ORDER BY id_brand ASC"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nama)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO brand (nama_brand) VALUES (?)"
        );
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    public function update($id, $nama)
    {
        $stmt = $this->conn->prepare(
            "UPDATE brand SET nama_brand=? WHERE id_brand=?"
        );
        $stmt->bind_param("si", $nama, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM brand WHERE id_brand=?"
        );
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
