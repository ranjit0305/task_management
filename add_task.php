<?php
// Include the config file for the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $time = $_POST['time'];

    // Check if a task already exists with the same deadline and time
    $stmt = $pdo->prepare('SELECT * FROM tasks WHERE deadline = ? AND time = ?');
    $stmt->execute([$deadline, $time]);

    if ($stmt->rowCount() > 0) {
        // Task already exists at the same date and time
        echo "<script>alert('A task is already scheduled at this time. Please choose a different time.'); window.location.href = 'index.php';</script>";
        exit();
    } else {
        // Prepare and execute the insert statement
        $stmt = $pdo->prepare('INSERT INTO tasks (title, description, deadline, time) VALUES (?, ?, ?, ?)');
        $stmt->execute([$title, $description, $deadline, $time]);

        // Redirect back to the index page
        header('Location: index.php');
        exit();
    }
}
?>
