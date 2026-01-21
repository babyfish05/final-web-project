<?php
require_once "model/stokmodel.php";

class stokController
{
    private $model;

    public function __construct()
    {
        $this->model = new Stok();
    }

    public function index()
    {
        // SIMPAN
        if (isset($_POST['id_produk'], $_POST['jumlah_stok'])) {
            $this->model->insert(
                $_POST['id_produk'],
                $_POST['jumlah_stok']
            );
            header("Location: index.php?page=stok");
            exit;
        }

        // HAPUS
        if (isset($_POST['hapus_id'])) {
            $this->model->delete($_POST['hapus_id']);
            header("Location: index.php?page=stok");
            exit;
        }

        // AMBIL DATA
        $result = $this->model->getAll();
        $stok   = mysqli_fetch_all($result, MYSQLI_ASSOC);

        require __DIR__ . '/../view/stok.php';
    }
}
