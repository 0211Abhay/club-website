<?php
session_start();
require_once '../config/config.php';

// If user is already logged in, redirect based on role
if (isset($_SESSION['user_id'])) {
    switch ($_SESSION['role']) {
        case 'admin':
            header('Location: ../views/dashboard/coordinator.php');
            exit();
        case 'coordinator':
            header('Location: ../views/dashboard/coordinator.php');
            exit();
        case 'mentor':
            header('Location: ../views/dashboard/mentor.php');
            exit();
        case 'member':
        default:
            header('Location: ../views/dashboard/member.php');
            exit();
    }
}

// If not logged in, redirect to login page
header('Location: ../views/auth/login.php');
exit();
?>
