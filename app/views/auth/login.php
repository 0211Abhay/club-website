<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (isset($_GET["error"])) echo "<p style='color: red;'>".$_GET["error"]."</p>"; ?>
<form method="POST" action="/app/controllers/AuthController.php">
    <input type="hidden" name="login" value="1">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>

</body>
</html>