<?php
class ProdukModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost","root","","skincare");
    }

    public function getAll() {
        $sql = "
            SELECT p.*, 
                   k.nama_kategori, 
                   b.nama_brand, 
                   s.nama_satuan
            FROM produk p
            JOIN kategori k ON p.id_kategori = k.id_kategori
            JOIN brand b ON p.id_brand = b.id_brand
            JOIN satuan s ON p.id_satuan = s.id_satuan
            ORDER BY p.id_produk ASC
        ";
        return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO produk (nama_produk,id_kategori,id_brand,id_satuan,harga)
             VALUES (?,?,?,?,?)"
        );
        $stmt->bind_param(
            "siiii",
            $data['nama_produk'],
            $data['id_kategori'],
            $data['id_brand'],
            $data['id_satuan'],
            $data['harga']
        );
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare(
            "UPDATE produk SET nama_produk=?, id_kategori=?, id_brand=?, id_satuan=?, harga=?
             WHERE id_produk=?"
        );
        $stmt->bind_param(
            "siiiii",
            $data['nama_produk'],
            $data['id_kategori'],
            $data['id_brand'],
            $data['id_satuan'],
            $data['harga'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM produk WHERE id_produk=?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}
