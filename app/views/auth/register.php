<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<form method="POST" action="../../controllers/AuthController.php">
    <input type="hidden" name="register">
    <input type="text" name="name" required placeholder="Full Name">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Register</button>
</form>
</body>
</html>
