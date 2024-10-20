<?php
// Include the config file for the database connection
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Task Management Tool</h1>

    <!-- Add Task Form -->
    <form action="add_task.php" method="POST">
    <label for="title">Task Title:</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Task Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="deadline">Deadline:</label>
    <input type="date" name="deadline" id="deadline" required>

    <label for="time">Time:</label>
    <input type="time" name="time" id="time" required>

    <input type="submit" value="Add Task">
</form>


    <hr>

    <h2>Task List</h2>
    <table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Deadline</th>
        <th>Time</th>
        <th>Actions</th>
    </tr>
    <?php
    // Fetch all tasks from the database
    $stmt = $pdo->query('SELECT * FROM tasks ORDER BY created_at DESC');

    while ($task = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($task['title']) . "</td>";
        echo "<td>" . htmlspecialchars($task['description']) . "</td>";
        echo "<td>" . htmlspecialchars($task['status']) . "</td>";
        echo "<td>" . htmlspecialchars($task['deadline']) . "</td>";
        echo "<td>" . htmlspecialchars($task['time']) . "</td>";  // Display task time
        echo "<td>
                <form action='update_task.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $task['id'] . "'>
                    <select name='status'>
                        <option value='pending' " . ($task['status'] === 'pending' ? 'selected' : '') . ">Pending</option>
                        <option value='in progress' " . ($task['status'] === 'in progress' ? 'selected' : '') . ">In Progress</option>
                        <option value='completed' " . ($task['status'] === 'completed' ? 'selected' : '') . ">Completed</option>
                    </select>
                    <input type='submit' value='Update'>
                </form>
                <form action='delete_task.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $task['id'] . "'>
                    <input type='submit' value='Delete'>
                </form>
              </td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
