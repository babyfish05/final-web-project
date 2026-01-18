<?php
session_start();
require_once __DIR__ . "/../model/usermodel.php";

$action = $_GET["action"] ?? "";

/*  LOGIN  */
if ($action === "login") {

    $email    = $_POST["email"];
    $password = $_POST["password"];

    $user = UserModel::findByEmail($email);

    if (!$user || !password_verify($password, $user["password"])) {
        $_SESSION["error"] = "Login gagal";
        header("Location: /final-web-project/view/auth/login.php");
        exit;
    }

    // SESSION YANG KONSISTEN
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user"] = [
        "id"    => $user["id"],
        "name"  => $user["name"],
        "email" => $user["email"]
    ];

    header("Location: /final-web-project/index.php?page=dashboard");
    exit;
}

/*  REGISTER  */
if ($action === "register") {

    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    UserModel::create($name, $email, $password);

    $_SESSION["success"] = "Registrasi berhasil, silakan login";
    header("Location: /final-web-project/view/auth/login.php");
    exit;
}
