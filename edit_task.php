<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit Task</h1>
    <?php
    include 'config.php';
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "SELECT * FROM tasks WHERE id = $id";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            echo "<form action='' method='post'>";
            echo "<label for='task_name'>Task Name:</label>";
            echo "<input type='text' name='task_name' value='" . $row['task_name'] . "' required>";
            echo "<label for='task_description'>Task Description:</label>";
            echo "<textarea name='task_description' required>" . $row['task_description'] . "</textarea>";
            echo "<input type='submit' name='submit' value='Update Task'>";
            echo "</form>";
        } else {
            echo "Task not found.";
        }
    }
    
    if (isset($_POST['submit'])) {
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        
        $query = "UPDATE tasks SET task_name = '$task_name', task_description = '$task_description' WHERE id = $id";
        
        if (mysqli_query($conn, $query)) {
            echo "Task updated successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
    <a href="index.php" class="back-button">Back to List</a>
</body>
</html>
