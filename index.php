<?php
session_start();

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    case 'kategori':
        require_once __DIR__ . '/controllers/kategoriController.php';
        (new KategoriController())->index();
        break;

    case 'brand':
        require_once __DIR__ . '/controllers/brandController.php';
        (new BrandController())->index();
        break;

    case 'satuan':
        require_once __DIR__ . '/controllers/satuanController.php';
        (new SatuanController())->index();
        break;

    case 'produk':
        require_once __DIR__ . '/controllers/produkController.php';
        (new ProdukController())->index();
        break;

    case 'stok':
        require_once __DIR__ . '/controllers/stokController.php';
        (new StokController())->index();
        break;

    case 'dashboard':
    default:
        require_once __DIR__ . '/controllers/dashboardController.php';
        (new DashboardController())->index();
        break;
}
