<?php
require_once __DIR__ . '/../model/satuanmodel.php';

class SatuanController
{
    private $model;

    public function __construct()
    {
        $this->model = new SatuanModel();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //  DELETE
            if (isset($_POST['hapus_id'])) {
                $this->model->delete($_POST['hapus_id']);

                header("Location: index.php?page=satuan");
                exit;
            }

            //  INSERT & UPDATE
            if (isset($_POST['nama_satuan'])) {
                $nama = $_POST['nama_satuan'];

                if (empty($_POST['id_satuan'])) {
                    $this->model->insert($nama);
                } else {
                    $this->model->update($_POST['id_satuan'], $nama);
                }

                header("Location: index.php?page=satuan");
                exit;
            }
        }

        $satuan = $this->model->getAll();
        require_once __DIR__ . '/../view/satuan.php';
    }
}
