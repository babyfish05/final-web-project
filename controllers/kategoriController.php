<?php
// KategoriController.php
header('Content-Type: application/json'); // Supaya output JSON

require_once __DIR__ . '/../model/KategoriModel.php';

class KategoriController {
    private $model;

    public function __construct() {
        $this->model = new KategoriModel();
    }

    // Menampilkan semua kategori
    public function index() {
        $data = $this->model->getAllKategori();
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    // Menambahkan kategori baru
    public function create($nama) {
        if (empty($nama)) {
            echo json_encode(['status' => 'error', 'message' => 'Nama kategori tidak boleh kosong']);
            return;
        }

        $result = $this->model->addKategori($nama);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Kategori berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan kategori']);
        }
    }

    // Menghapus kategori
    public function delete($id) {
        if (empty($id)) {
            echo json_encode(['status' => 'error', 'message' => 'ID kategori diperlukan']);
            return;
        }

        $result = $this->model->deleteKategori($id);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Kategori berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus kategori']);
        }
    }

    // Mengupdate kategori
    public function update($id, $nama) {
        if (empty($id) || empty($nama)) {
            echo json_encode(['status' => 'error', 'message' => 'ID dan nama kategori diperlukan']);
            return;
        }

        $result = $this->model->updateKategori($id, $nama);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Kategori berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate kategori']);
        }
    }
}
?>
