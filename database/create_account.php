<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $department = $_POST['department'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($department) || empty($username) || empty($password)) {
        echo '<div class="alert alert-danger">All fields are required!</div>';
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO accounts (name, department, username, password) VALUES (:name, :department, :username, :password)");
        $stmt->execute([
            ':name' => $name,
            ':department' => $department,
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
        ]);

        // Success message only
        echo '<div class="alert alert-success">Account created successfully!</div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
    }
} else {
    echo '<div class="alert alert-danger">Invalid request method.</div>';
}
?>
