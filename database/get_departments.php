<?php
// Array of departments
$departments = [
    "IT", "LAD", "Accounting", "Cash", 
    "HR", "CMD", "RMD", "Marketing", 
    "Compliance", "Audit"
];

// Return the departments as a JSON response
header('Content-Type: application/json');
echo json_encode($departments);
?>
