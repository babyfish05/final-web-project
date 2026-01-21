<?php
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "skincare");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}
