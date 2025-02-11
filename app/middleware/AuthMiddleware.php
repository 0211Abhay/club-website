<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /public/auth/login.php");
        exit;
    }
}

function checkRole($allowedRoles) {
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowedRoles)) {
        header("Location: /public/dashboard/member.php");
        exit;
    }
}
?>
