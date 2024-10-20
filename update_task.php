<?php
// Include the config file for the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get task ID and new status
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Prepare and execute the update statement
    $stmt = $pdo->prepare('UPDATE tasks SET status = ? WHERE id = ?');
    $stmt->execute([$status, $id]);

    // Redirect back to the index page
    header('Location: index.php');
    exit();
}
?>
