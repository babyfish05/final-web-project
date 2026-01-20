<?php
require_once __DIR__ . '/../model/kategorimodel.php';

class KategoriController {

    private $model;

    public function __construct() {
        $this->model = new KategoriModel();
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //  DELETE 
            if (isset($_POST['hapus_id'])) {
                $this->model->delete($_POST['hapus_id']);

                header("Location: index.php?page=kategori");
                exit;
            }

            //  INSERT & UPDATE 
            if (isset($_POST['nama_kategori'])) {
                $nama = $_POST['nama_kategori'];

                if (empty($_POST['id_kategori'])) {
                    $this->model->insert($nama);
                } else {
                    $this->model->update($_POST['id_kategori'], $nama);
                }

                header("Location: index.php?page=kategori");
                exit;
            }
        }

        $kategori = $this->model->getAll();
        require_once __DIR__ . '/../view/kategori.php';
    }
}