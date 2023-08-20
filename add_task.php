<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Add New Task</h1>
    <form action="" method="post">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" required>
        <label for="task_description">Task Description:</label>
        <textarea name="task_description" required></textarea>
        <input type="submit" name="submit" value="Add Task">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        include 'config.php';
        
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        
        $query = "INSERT INTO tasks (task_name, task_description) VALUES ('$task_name', '$task_description')";
        
        if (mysqli_query($conn, $query)) {
            echo "Task added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
    <a href="index.php" class="back-button">Back to List</a>
</body>
</html>
