<?php
require_once 'db/db.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
    } else {
        echo "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
<div class="Registration">
        <h2> LOGIN</h2>
        <div class="container">
            <form action="login.php" method="post">
                
                <br>
                <br>
                <label style="text-align: left;">Name:</label><br>
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <label>Password: </label> <br>
                <input type="password" name="password" placeholder="Password" required class="pass-word">
                <br>
                <input type="Submit" name=" login" value="LOGIN">
        </div>
        </form>
    </div>
</body>
</html>
