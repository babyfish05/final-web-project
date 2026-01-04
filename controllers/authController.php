<?php
session_start();
require_once __DIR__ . "/../model/usermodel.php";

$action = $_GET["action"] ?? "";

/* ================= LOGIN ================= */
if ($action === "login") {
    $user = UserModel::findByEmail($_POST["email"]);

    if (!$user || !password_verify($_POST["password"], $user["password"])) {
        $_SESSION["error"] = "Login gagal";
        header("Location: /final-web-project/view/auth/login.php");
        exit;
    }

    $_SESSION["user_id"] = $user["id"];
    header("Location: /final-web-project/view/dashboard.php");
    exit;
}

/* ================= REGISTER ================= */
if ($action === "register") {
    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $password = $_POST["password"]; // jangan di-hash di sini

    UserModel::create($name, $email, $password);

    $_SESSION["success"] = "Registrasi berhasil, silakan login";
    header("Location: /final-web-project/view/auth/login.php");
    exit;
}
