    <?php
    class KategoriModel {
        private $conn;

        public function __construct() {
            $this->conn = new mysqli('localhost', 'root', '', 'skincare');
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function getAll() {
            $result = $this->conn->query("SELECT * FROM kategori");
            $data = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        //  INSERT DATA
        public function insert($nama) {
            $stmt = $this->conn->prepare(
                "INSERT INTO kategori (nama_kategori) VALUES (?)"
            );
            $stmt->bind_param("s", $nama);
            return $stmt->execute();
        }

        //  UPDATE DATA
        public function update($id, $nama) {
            $stmt = $this->conn->prepare(
                "UPDATE kategori SET nama_kategori=? WHERE id_kategori=?"
            );
            $stmt->bind_param("si", $nama, $id);
            return $stmt->execute();
        }

        //  DELETE DATA
        public function delete($id) {
            $stmt = $this->conn->prepare(
                "DELETE FROM kategori WHERE id_kategori=?"
            );
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
    }
