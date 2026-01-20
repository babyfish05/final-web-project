<?php

require_once __DIR__ . '/../model/DashboardModel.php';

class DashboardController
{
    public function index()
    {
        $model = new DashboardModel();

$data = [
    'totalProduk'   => $model->getTotalProduk(),
    'totalKategori' => $model->getTotalKategori(),
    'totalBrand'    => $model->getTotalBrand(),
    'totalSatuan'   => $model->getTotalSatuan(),
    'stokActivity'  => $model->getStokActivity()
];
        require __DIR__ . '/../view/dashboard.php';
    }
}