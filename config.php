<?php
// Database connection settings
$host = 'localhost';
$db = 'task_management';  // The database you created
$user = 'root';           // Your MySQL username (default is 'root' for XAMPP)
$pass = '';               // Your MySQL password (leave blank for XAMPP on Windows)

try {
    // Create a new PDO instance and connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set error reporting mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If there is an error with the database connection, display it
    die("Database connection failed: " . $e->getMessage());
}
