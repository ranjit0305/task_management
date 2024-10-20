<?php
// Include the config file for the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get task ID
    $id = $_POST['id'];

    // Prepare and execute the delete statement
    $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = ?');
    $stmt->execute([$id]);

    // Redirect back to the index page
    header('Location: index.php');
    exit();
}
?>
