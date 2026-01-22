<?php
require_once __DIR__ . '/../model/stokmodel.php';

class StokController {
    private $model;

    public function __construct() {
        $this->model = new Stok();
    }

    public function index() {
        // Tambah stok
        if (isset($_POST['id_produk'], $_POST['jumlah_stok'])) {
            $this->model->insert($_POST['id_produk'], $_POST['jumlah_stok']);
            header("Location: index.php?page=stok");
            exit;
        }

        // Hapus stok
        if (isset($_POST['hapus_id'])) {
            $this->model->delete($_POST['hapus_id']);
            header("Location: index.php?page=stok");
            exit;
        }

        // Edit stok
        if (isset($_POST['edit_id'], $_POST['edit_jumlah'])) {
            $this->model->update($_POST['edit_id'], $_POST['edit_jumlah']);
            header("Location: index.php?page=stok");
            exit;
        }

        // Ambil data stok
        $result_stok = $this->model->getAll();
        $stok = mysqli_fetch_all($result_stok, MYSQLI_ASSOC);

        // Ambil data produk
        $result_produk = $this->model->getProduk();
        $produk = mysqli_fetch_all($result_produk, MYSQLI_ASSOC);

        require __DIR__ . '/../view/stok.php';
    }
}
