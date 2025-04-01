<?php
require_once 'connection.php';

try {
    // Fetch all accounts from the database
    $stmt = $pdo->query("SELECT id, username, name, department FROM accounts ORDER BY id DESC");
    $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($accounts) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Username</th>';
        echo '<th>Name</th>';
        echo '<th>Department</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($accounts as $account) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($account['id']) . '</td>';
            echo '<td>' . htmlspecialchars($account['username']) . '</td>';
            echo '<td>' . htmlspecialchars($account['name']) . '</td>';
            echo '<td>' . htmlspecialchars($account['department']) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info">No accounts found.</div>';
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
}
?>
