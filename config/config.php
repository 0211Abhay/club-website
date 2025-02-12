<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'club-website');
define('DB_USER', 'root');  // Change if not using XAMPP
define('DB_PASS', '');      // Set password if required

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>