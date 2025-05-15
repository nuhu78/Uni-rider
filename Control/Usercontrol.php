<?php 
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Full name validation
    $fullname = trim($_POST["fullname"]);
    if (strlen($fullname) < 3) {
        $errors['fullname'] = "Full name must be at least 3 characters.";
    }

    // Username validation
    $username = trim($_POST["username"]);
    if (empty($username) || preg_match('/\s/', $username)) {
        $errors['username'] = "Username cannot be empty or contain spaces.";
    }

    // Email validation
    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    // Phone number validation
    $phone = trim($_POST["phone"]);
    if (!preg_match('/^\d{10,15}$/', $phone)) {
        $errors['phone'] = "Enter a valid phone number (10-15 digits).";
    }

    // University ID validation
    $university_id = trim($_POST["university_id"]);
    if (strlen($university_id) < 4) {
        $errors['university_id'] = "University ID must be at least 4 characters.";
    }

    // Gender validation
    if (empty($_POST["gender"])) {
        $errors['gender'] = "Please select your gender.";
    }

    // Password validation
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // If no errors, process the form (e.g., save to database)
    if (empty($errors)) {
        // Process the data
        // For example: save to database or send email
    }
}
?>
