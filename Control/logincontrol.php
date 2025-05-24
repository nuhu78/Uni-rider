<?php
require_once "../Model/db.php";

// Initialize variables
$email = $password = $role = "";
$errorEmail = $errorPassword = $errorRole = $loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // Role validation
    $role = $_POST['role'] ?? '';
    if ($role !== "User" && $role !== "Rider") {
        $errorRole = "Please select User or Rider.";
        $isValid = false;
    }

    // Email validation
    $email = trim($_POST['email'] ?? '');
    if (empty($email)) {
        $errorEmail = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Invalid email format.";
        $isValid = false;
    }

    // Password validation
    $password = trim($_POST['password'] ?? '');
    if (empty($password)) {
        $errorPassword = "Password is required.";
        $isValid = false;
    }

    if ($isValid) {
        try {
            $table = ($role === "User") ? "users" : "riders";

            $stmt = $conn->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->execute([$email]);

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $role;
                    header("Location: ../View/profile.php");
                    exit;
                } else {
                    $loginError = "Incorrect password.";
                }
            } else {
                $loginError = "No account found with this email.";
            }
        } catch (PDOException $e) {
            $loginError = "Database error: " . $e->getMessage();
        }
    }
}
