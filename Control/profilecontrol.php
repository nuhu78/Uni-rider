<?php
if (!isset($_SESSION['email']) || !isset($_SESSION['role'])) {
    header("Location: ../View/login.php");
    exit();
}

require_once "../Model/db.php";

$email = $_SESSION['email'];
$role = $_SESSION['role'];
$table = ($role === "User") ? "users" : "riders";

// Fetch user info
$stmt = $conn->prepare("SELECT * FROM $table WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle button actions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update_profile'])) {
        header("Location: updateprofile.php");
        exit();
    }
    if (isset($_POST['delete_account'])) {
        // Delete user from database
        $delStmt = $conn->prepare("DELETE FROM $table WHERE email = ?");
        $delStmt->execute([$email]);

        // Destroy session
        session_unset();
        session_destroy();

        // Redirect to login page
        header("Location: ../View/login.php");
        exit();
    }
}