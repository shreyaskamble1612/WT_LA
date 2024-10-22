<?php
require_once 'db/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
$user_id = $_SESSION['user_id'];

// Add Todo
if (isset($_POST['add_todo'])) {
    $title = $_POST['title'];
    $sql = "INSERT INTO todos (user_id, title) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $user_id, $title);
    $stmt->execute();
    header('Location: index.php');
}

// Delete Todo
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM todos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header('Location: index.php');
}

// Mark Todo as Completed
if (isset($_GET['complete'])) {
    $id = $_GET['complete'];
    $sql = "UPDATE todos SET status = 'completed' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header('Location: index.php');
}
?>
