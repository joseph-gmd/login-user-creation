<?php
try {
    // Replace with your database credentials
    $dsn = "mysql:host=localhost;dbname=test;charset=utf8mb4";
    $username = "root";
    $password = "Allyanamae116";

    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
