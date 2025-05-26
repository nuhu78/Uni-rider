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

// Prepare filtered profile data for display
$exclude = ['id', 'password', 'registered_at', 'profile_picture'];
$profileData = [];
if ($user) {
    foreach ($user as $key => $value) {
        if (!in_array($key, $exclude)) {
            $profileData[$key] = $value;
        }
    }
}

// Profile picture logic
$profilePic = (!empty($user['profile_picture'])) ? "../uploads/" . htmlspecialchars($user['profile_picture']) : "../image/default.jpg";
$successMsg = "";

// Handle photo upload
if (isset($_POST['upload_photo']) && isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['profile_picture']['tmp_name'];
    $fileName = basename($_FILES['profile_picture']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExt, $allowed)) {
        $newFileName = uniqid("profile_", true) . "." . $fileExt;
        $uploadDir = "../uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadPath = $uploadDir . $newFileName;
        if (move_uploaded_file($fileTmp, $uploadPath)) {
            // Save filename to database
            $updateStmt = $conn->prepare("UPDATE $table SET profile_picture = ? WHERE email = ?");
            $updateStmt->execute([$newFileName, $email]);
            $successMsg = "Your profile picture saved.";
            // Update $user and $profilePic for immediate display
            $user['profile_picture'] = $newFileName;
            $profilePic = "../uploads/" . $newFileName;
        }
    }
}

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