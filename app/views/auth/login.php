<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php if (isset($_GET["error"])) echo "<p style='color: red;'>".$_GET["error"]."</p>"; ?>
<form method="POST" action="../../controllers/AuthController.php">
    <input type="hidden" name="login">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
</body>
</html>
