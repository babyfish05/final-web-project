<?php

require_once __DIR__ . '/../model/DashboardModel.php';

class DashboardController
{
    private $model;

    public function __construct()
    {
        $this->model = new DashboardModel();
    }

    public function index()
    {
        $data = [
            'totalProduk'   => $this->model->getTotalProduk(),
            'totalKategori' => $this->model->getTotalKategori(),
            'totalBrand'    => $this->model->getTotalBrand(),
            'totalSatuan'   => $this->model->getTotalSatuan(),
            'stokActivity'  => $this->model->getStokActivity()
        ];

        require_once __DIR__ . '/../view/dashboard.php';
    }
}
