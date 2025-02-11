<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/User.php';
session_start();

$db = new Database();
$userModel = new User($db->connect());

// Handle Registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($userModel->register($name, $email, $password)) {
        header("Location: /public/auth/login.php?success=registered");
        exit;
    } else {
        header("Location: /public/auth/register.php?error=failed");
        exit;
    }
}

// Handle Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $userModel->login($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'coordinator') {
            header("Location: /public/dashboard/coordinator.php");
        } elseif ($user['role'] === 'mentor') {
            header("Location: /public/dashboard/mentor.php");
        } else {
            header("Location: /public/dashboard/member.php");
        }
        exit;
    } else {
        header("Location: /public/auth/login.php?error=invalid");
        exit;
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /public/auth/login.php");
    exit;
}
?>
