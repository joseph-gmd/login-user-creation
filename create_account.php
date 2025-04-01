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
            <h2 class="text-center">Create an Account</h2>
            <form id="accountForm" action="database/create_account.php" method="POST" class="p-4 border rounded">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-select" id="department" name="department" required>
                        <option value="" selected disabled>Loading...</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>

            <div id="result" class="mt-4">
                <!-- Display account creation result here -->
            </div>

            <h3 class="text-center mt-5">Existing Accounts</h3>
            <div id="accountsTable" class="mt-3">
                <!-- Table will be loaded here -->
            </div>
            </main>
        </div>
    </div>
</body>
<script>
    async function loadDepartments() {
        const response = await fetch('database/get_departments.php');
        const departments = await response.json();
        const departmentSelect = document.getElementById('department');
        departmentSelect.innerHTML = '<option value="" selected disabled>Select a Department</option>';
        departments.forEach(department => {
            const option = document.createElement('option');
            option.value = department;
            option.textContent = department;
            departmentSelect.appendChild(option);
        });
    }

    async function loadAccounts() {
        const response = await fetch('database/display_accounts.php');
        const accountsTable = document.getElementById('accountsTable');
        accountsTable.innerHTML = await response.text();
    }

    const form = document.getElementById('accountForm');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        const response = await fetch('database/create_account.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text();
        document.getElementById('result').innerHTML = result;
        form.reset();
        loadAccounts();
    });

    document.addEventListener('DOMContentLoaded', () => {
        loadDepartments();
        loadAccounts();
    });
</script>
</html>
