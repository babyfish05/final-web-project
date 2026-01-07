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

    // Set session login
    $_SESSION["user"] = [
        "id" => $user["id"],
        "name" => $user["name"],
        "email" => $user["email"]
    ];

    // HARUS LEWAT INDEX → CONTROLLER DASHBOARD
    header("Location: /final-web-project/index.php?page=dashboard");
    exit;
    /* ================= REGISTER ================= */
if ($action === "register") {
    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // HARUS di-hash di sini

    UserModel::create($name, $email, $password);

    $_SESSION["success"] = "Registrasi berhasil, silakan login";
    header("Location: /final-web-project/view/auth/login.php");
    exit;
}

}
