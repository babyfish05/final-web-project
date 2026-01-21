<?php
require_once __DIR__ . '/../model/produkmodel.php';
require_once __DIR__ . '/../model/kategorimodel.php';
require_once __DIR__ . '/../model/brandmodel.php';
require_once __DIR__ . '/../model/satuanmodel.php';

class ProdukController {

    private $produkModel;
    private $kategoriModel;
    private $brandModel;
    private $satuanModel;

    public function __construct() {
        $this->produkModel   = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
        $this->brandModel    = new BrandModel();
        $this->satuanModel   = new SatuanModel();
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['hapus_id'])) {
                $this->produkModel->delete($_POST['hapus_id']);
                header("Location: index.php?page=produk");
                exit;
            }

            if (isset($_POST['nama_produk'])) {
                $data = [
                    'nama_produk' => $_POST['nama_produk'],
                    'id_kategori' => $_POST['id_kategori'],
                    'id_brand'    => $_POST['id_brand'],
                    'id_satuan'   => $_POST['id_satuan'],
                    'harga'       => $_POST['harga']
                ];

                if (empty($_POST['id_produk'])) {
                    $this->produkModel->insert($data);
                } else {
                    $this->produkModel->update($_POST['id_produk'], $data);
                }

                header("Location: index.php?page=produk");
                exit;
            }
        }

        $produk   = $this->produkModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $brand    = $this->brandModel->getAll();
        $satuan   = $this->satuanModel->getAll();

        require_once __DIR__ . '/../view/produk.php';
    }
}
