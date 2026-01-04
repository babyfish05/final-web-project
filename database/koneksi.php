<?php
$conn = new mysqli("localhost", "root", "", "skincare");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
