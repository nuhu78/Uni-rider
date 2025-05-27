<?php
session_start();
$email = $password = $role = "";
$errorEmail = $errorPassword = $errorRole = $loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // Role validation
    $role = $_POST['role'] ?? '';
    if ($role !== "admin") {
        $errorRole = "User or Rider can't login from here";
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
        $con = mysqli_connect("127.0.0.1:3306", "root", "", "unirider_db");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";
            $obj = mysqli_query($con, $sql);
            if ($obj) {
                $row = mysqli_fetch_array($obj);
                $count = mysqli_num_rows($obj);
                    if ($count==1) {
                        echo "<script>alert('Login successful!');</script>";
                        header("Location: ../View/admin.php");
                        $_SESSION['is_success'] = true;
                        $_SESSION['is_admin'] = true;
                        $_SESSION['admin_name'] = $row['fullname'];
                    } else {
                        echo "<script>alert('$sql');</script>";
                        $loginError = "Invalid email ooor password.";
                    }
                }
    }
}
