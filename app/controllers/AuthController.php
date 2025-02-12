<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/User.php';
session_start();

class AuthController {
    private $userModel;

    public function __construct() {
        $db = Database::getInstance()->getConnection();
        $this->userModel = new User($db);
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($name, $email, $password)) {
                header("Location: ../../app/views/auth/login.php?success=registered");
                exit;
            } else {
                header("Location: ../../app/views/auth/register.php?error=failed");
                exit;
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                $redirectUrl = "../../app/views/dashboard/{$user['role']}.php";
                header("Location: $redirectUrl");
                exit;
            } else {
                header("Location: ../../app/views/auth/login.php?error=invalid");
                exit;
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: ../../app/views/auth/login.php");
        exit;
    }
}

// Handle Routes
$auth = new AuthController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['register'])) {
        $auth->register();
    } elseif (isset($_POST['login'])) {
        $auth->login();
    }
} elseif (isset($_GET['logout'])) {
    $auth->logout();
}
?>
