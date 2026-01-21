<?php

require_once __DIR__ . '/../models/BrandModel.php';

class BrandController
{
    public function index()
    {
        $model = new Brandmodel();
        $brands = $model->getAll();

        require_once __DIR__ . '/../views/brand/index.php';
    }
}
