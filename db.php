<?php
// Database connection
$host = "localhost";
$db = "focuszen";   // Make sure database exists
$user = "root";     // XAMPP default
$pass = "";         // XAMPP default
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
