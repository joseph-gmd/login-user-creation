<?php
// Get the current script name to highlight the active menu item
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="col-md-3 col-lg-2 d-md-block bg-light border-end sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active bg-primary text-white' : ''; ?>" href="dashboard.php">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'create_account.php' ? 'active bg-primary text-white' : ''; ?>" href="create_account.php">
                    Account Creation
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    .sidebar {
        min-height: 100vh;
    }

    .nav-link {
        border-bottom: 1px solid #ddd; /* Add bottom border between items */
    }

    .nav-link:hover {
        background-color: #f8f9fa; /* Slightly darker background on hover */
    }

    .nav-link.active {
        border-left: 4px solid #0d6efd; /* Highlight active link with border */
    }
</style>
