<?php
require_once __DIR__ . '/../../middlewares/AuthMiddleware.php';
checkAuth();
checkRole(['coordinator', 'admin']);
?>

<h1>Welcome, Coordinator</h1>
<a href="/app/controllers/AuthController.php?logout=1">Logout</a>
