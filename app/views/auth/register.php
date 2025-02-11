<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="/app/controllers/AuthController.php">
    <input type="hidden" name="register" value="1">
    <input type="text" name="name" required placeholder="Full Name">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Register</button>
</form>

</body>
</html>