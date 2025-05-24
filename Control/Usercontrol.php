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
    } else {
        $gender = $_POST["gender"];
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
        // Include your database connection
        require_once '../Model/db.php'; // Make sure this returns a PDO connection in $conn

<<<<<<< HEAD
        // Check for duplicate username or email
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        $count = $stmt->fetchColumn();
=======
        // Hash the password
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
>>>>>>> c66c3de22fea6fac7567f29eb3aacffcc18f8c33

        if ($count > 0) {
            $errors['duplicate'] = "Username or email already exists.";
            echo $errors['duplicate'];
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute with PDO
            $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, phone, university_id, gender, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $result = $stmt->execute([
                    $fullname,
                    $username,
                    $email,
                    $phone,
                    $university_id,
                    $gender,
                    $hashed_password
                ]);

                if ($result) {
                    // Registration successful, set a flag for the view
                    $successMessage = "Registration successful!";
                    // Do not redirect, let the view show the message
                } else {
                    $errors['database'] = "Database error: " . implode(" ", $stmt->errorInfo());
                }
            } else {
                $errors['database'] = "Database prepare error: " . implode(" ", $conn->errorInfo());
            }
        }
        // No need to close PDO connection
    }
}
?>
