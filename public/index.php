<?php
session_start();
require_once '../config/config.php';

if (isset($_SESSION['user_id'])) {
    $role = $_SESSION['role'];
    header("Location: ../views/dashboard/{$role}.php");
    exit();
}

header("Location: ../views/auth/login.php");
exit();
?>
