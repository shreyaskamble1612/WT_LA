<?php
require_once 'db/db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();

    header('Location: login.php');
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="registration-body">
    
    <form action="register.php" method="post" class="form-style">
        <h2>Register</h2>
        <input type="text" name="username" placeholder="Username" required class="user-name">
        <input type="password" name="password" placeholder="Password" required class="pass-word">
        <button type="submit" name="register" class="btn">Register</button>
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="Registration">
        <h2> REGISTER HERE..</h2>
        <div class="container">
            <form action="register.php" method="post">
                
                <br>
                <br>
                <label style="text-align: left;">Name:</label><br>
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <label>Password: </label> <br>
                <input type="password" name="password" placeholder="Password" required class="pass-word">
                <br>
                <input type="Submit" name=" register" value="REGISTER">
        </div>
        </form>
    </div>
</body>
</html>