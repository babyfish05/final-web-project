<?php
require_once __DIR__ . '/../database/koneksi.php';

class Stok
{
    private $conn;

    public function __construct()
    {
        $this->conn = koneksi();
    }

    // Ambil stok + data produk
    public function getAll()
    {
        $sql = "
            SELECT 
                s.id_stok,
                s.jumlah_stok,
                p.nama_produk
            FROM stok s
            JOIN produk p ON s.id_produk = p.id_produk
            ORDER BY s.id_stok DESC
        ";

        return mysqli_query($this->conn, $sql);
    }

    public function insert($id_produk, $jumlah)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO stok (id_produk, jumlah_stok) VALUES (?, ?)"
        );
        $stmt->bind_param("ii", $id_produk, $jumlah);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM stok WHERE id_stok=?"
        );
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
