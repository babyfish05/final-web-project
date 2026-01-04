<?php
require_once __DIR__ . "/../database/koneksi.php";

class UserModel {

    public static function findByEmail($email) {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($name, $email, $password) {
        global $conn;

        $hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sss", $name, $email, $hash);
        return $stmt->execute();
    }
}
