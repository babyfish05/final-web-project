<?php
require_once "model/ProdukModel.php";

class ProdukController {
    private $model;

    public function __construct() {
        $this->model = new ProdukModel();
    }

    public function index() {
        $produk = $this->model->getAll();
        $brand  = $this->model->getBrand();
        require_once "view/produk.php";
    }

    public function store() {
        $this->model->insert(
            $_POST['nama_produk'],
            $_POST['harga'],
            $_POST['id_brand']
        );
        header("Location: bren.php?page=produk");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: bren.php?page=produk");
    }
}
