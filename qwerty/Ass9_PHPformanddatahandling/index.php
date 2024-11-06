<?php
// form_handling.php

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        $success = "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        .form-group {
            margin-bottom: 15px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"
                value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message"
                name="message"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $success): ?>
        <div style="max-width: 500px; margin: 20px auto;">
            <h3>Submitted Data:</h3>
            <p>Name: <?php echo htmlspecialchars($name); ?></p>
            <p>Email: <?php echo htmlspecialchars($email); ?></p>
            <p>Message: <?php echo htmlspecialchars($message); ?></p>
        </div>
    <?php endif; ?>
</body>

</html>