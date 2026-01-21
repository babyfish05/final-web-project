<?php
session_start();

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {
    case 'dashboard':
        require_once "controller/dasboardController.php";
        $controller = new DashboardController();
        $controller->index();
        break;

    default:
        echo "Page ada";
}