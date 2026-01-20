<?php
class ProdukModel {
    public function getAllProduk() {
        global $conn;
        $query = "SELECT * FROM produk";
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}
?>
