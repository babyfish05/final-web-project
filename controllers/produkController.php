<?php
require_once './database/koneksi.php';
require_once './model/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct() {
        $this->model = new ProdukModel();
    }

    public function index() {
        $dataProduk = $this->model->getAllProduk();
        include './view/produkView.php';
    }
}
?>
