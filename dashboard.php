<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'partials/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
                <p>This is your dashboard.</p>
            </main>
        </div>
    </div>
</body>
</html>
