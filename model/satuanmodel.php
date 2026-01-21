<?php
class SatuanModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'skincare');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    //  AMBIL SEMUA DATA (TERBARU DI ATAS)
    public function getAll()
    {
        $result = $this->conn->query(
            "SELECT * FROM satuan ORDER BY id_satuan ASC"
        );

        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //  INSERT DATA
    public function insert($nama)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO satuan (nama_satuan) VALUES (?)"
        );
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    //  UPDATE DATA
    public function update($id, $nama)
    {
        $stmt = $this->conn->prepare(
            "UPDATE satuan SET nama_satuan=? WHERE id_satuan=?"
        );
        $stmt->bind_param("si", $nama, $id);
        return $stmt->execute();
    }

    //  DELETE DATA
    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM satuan WHERE id_satuan=?"
        );
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
