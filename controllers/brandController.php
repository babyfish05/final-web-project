<?php
require_once __DIR__ . '/../model/brandmodel.php';

class brandController
{
    private $model;

    public function __construct()
    {
        $this->model = new BrandModel();
    }

    public function index()
    {
        /* SIMPAN & UPDATE */
        if (isset($_POST['nama_brand'])) {
            if (!empty($_POST['id_brand'])) {
                $this->model->update(
                    $_POST['id_brand'],
                    $_POST['nama_brand']
                );
            } else {
                $this->model->insert($_POST['nama_brand']);
            }
            header("Location: index.php?page=brand");
            exit;
        }

        /* HAPUS */
        if (isset($_POST['hapus_id'])) {
            $this->model->delete($_POST['hapus_id']);
            header("Location: index.php?page=brand");
            exit;
        }

        /* TAMPILKAN DATA */
        $brand = $this->model->getAll(); // ← sudah array

        require __DIR__ . '/../view/brand.php';
    }
}
