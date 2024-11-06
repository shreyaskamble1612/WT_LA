<?php
// session_management.php

session_start();

class SessionManager
{
    // Login function
    public function login($username, $userRole)
    {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $userRole;
        $_SESSION['login_time'] = time();
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public function getCurrentUser()
    {
        if ($this->isLoggedIn()) {
            return [
                'username' => $_SESSION['username'],
                'role' => $_SESSION['role'],
                'login_time' => date('Y-m-d H:i:s', $_SESSION['login_time'])
            ];
        }
        return null;
    }

    public function logout()
    {
        $_SESSION = array();

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }

        session_destroy();
    }

    public function regenerateSession()
    {
        session_regenerate_id(true);
    }
}

$sessionManager = new SessionManager();

if (!$sessionManager->isLoggedIn()) {
    $sessionManager->login('john_doe', 'admin');
    echo "User logged in successfully!\n";
}

if ($sessionManager->isLoggedIn()) {
    $user = $sessionManager->getCurrentUser();
    echo "\nCurrent user information:\n";
    echo "Username: " . $user['username'] . "\n";
    echo "Role: " . $user['role'] . "\n";
    echo "Login Time: " . $user['login_time'] . "\n";
}


?>