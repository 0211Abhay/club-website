<?php
session_start();
require_once 'D:/xampp/htdocs/Programming-Portal/app/core/Database.php';

// Check if the user is logged in and is a Member
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Member') {
    header('Location: login.php');
    exit();
}

$db = Database::getInstance()->getConnection();
$user_id = $_SESSION['user_id'];

// Fetch Member Details
$query = $db->prepare("SELECT name, email FROM users WHERE id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

// Fetch Events Registered by Member
// $eventQuery = $db->prepare("SELECT e.event_name, e.date FROM events e JOIN event_registrations er ON e.id = er.event_id WHERE er.user_id = ?");
// $eventQuery->bind_param('i', $user_id);
// $eventQuery->execute();
// $events = $eventQuery->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        
        <h4 class="mt-4">Registered Events</h4>
        <ul class="list-group">
            <?php while ($event = $events->fetch_assoc()): ?>
                <li class="list-group-item">
                    <?php echo htmlspecialchars($event['event_name']) . ' - ' . htmlspecialchars($event['date']); ?>
                </li>
            <?php endwhile; ?>
        </ul>
        
        <h4 class="mt-4">Explore</h4>
        <a href="code_compiler.php" class="btn btn-primary">Code Compiler</a>
        <a href="quiz_module.php" class="btn btn-success">Quiz Module</a>
        <a href="competitive_programming.php" class="btn btn-warning">Competitive Programming</a>
        <br><br>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
