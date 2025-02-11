<?php
require_once __DIR__ . "/../controllers/AuthController.php";

$auth = new AuthController();

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "login":
            $auth->login();
            break;
        case "register":
            $auth->register();
            break;
        case "logout":
            $auth->logout();
            break;
        default:
            echo "Invalid action!";
            break;
    }
}
?>
