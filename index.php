<?php

require_once __DIR__ . '/controllers/DashboardController.php';

$dashboard = new DashboardController();
$dashboard->index();
