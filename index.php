<?php
session_start();

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {
    case 'kategori':
        require_once __DIR__ . '/controllers/kategoriController.php';
        $controller = new kategoriController();
        $controller->index();
        break;

    case 'dashboard':
    default:
        require_once __DIR__ . '/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;
}
