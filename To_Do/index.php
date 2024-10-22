<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
require_once 'db/db.php';
$user_id = $_SESSION['user_id'];

// Fetch todos
$sql = "SELECT * FROM todos WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$todos = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>My Todo List</h2>
        <form action="todo.php" method="post">
            <input type="text" name="title" placeholder="Add new todo" required>
            <button type="submit" name="add_todo">Add</button>
        </form>

        <ul id="todoList">
            <?php while ($todo = $todos->fetch_assoc()): ?>
                <li>
                <span><?php echo $todo['title']; ?></span>
                   <a href="todo.php?delete=<?php echo $todo['id']; ?>">Delete</a>
                   <a href="todo.php?complete=<?php echo $todo['id'];?>">Complete</a>
                </li>
            <?php endwhile; ?>
        </ul>

    <a href="logout.php">Logout</a>
    </div>
    
</body>
</html>
