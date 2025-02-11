<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Register a new user with the default role "member"
    public function register($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $defaultRole = "member"; // Default role

        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $hashedPassword, $defaultRole]);
    }

    // Check login credentials
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user details if password matches
        }
        return false; // Invalid credentials
    }

    // Get user by ID
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
