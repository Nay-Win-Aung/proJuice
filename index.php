<!DOCTYPE html>
<html>
<head>
    <title>Task Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Task Management System</h1>
    <?php
    include 'config.php';
    
    $query = "SELECT * FROM tasks";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='task'>";
        echo "<h2>" . $row['task_name'] . "</h2>";
        echo "<p>" . $row['task_description'] . "</p>";
        echo "<a href='edit_task.php?id=" . $row['id'] . "'>Edit</a>";
        echo "<a href='delete_task.php?id=" . $row['id'] . "' class='delete'>Delete</a>";
        echo "</div>";
    }
    ?>
    <a href="add_task.php" class="add-button">Add Task</a>
</body>
</html>
