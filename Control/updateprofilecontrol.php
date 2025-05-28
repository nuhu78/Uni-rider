<?php
if (!isset($_SESSION['email']) || !isset($_SESSION['role'])) {
    header("Location: ../View/login.php");
    exit();
}

require_once "../Model/db.php";

$session_email = $_SESSION['email'];
$role = $_SESSION['role'];
$table = ($role === "User") ? "users" : "riders";

// Fetch current data
$stmt = $conn->prepare("SELECT * FROM $table WHERE email = ?");
$stmt->execute([$session_email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Initialize variables from DB or POST
$fullname = $user['fullname'] ?? '';
$email = $user['email'] ?? '';
$phone = $user['phone'] ?? '';
$vehicle = $user['vehicle'] ?? '';
$vehicle_reg = $user['vehicle_reg'] ?? '';
$license_no = $user['license_no'] ?? '';
$seats = $user['seats'] ?? '';
$route = $user['route'] ?? '';

$errorName = $errorEmail = $errorPhone = $errorVehicle = $errorVehicleReg = $errorLicenseNo = $errorSeats = $errorRoute = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $isValid = true;

    // Full name validation
    $fullname = trim($_POST['fullname'] ?? '');
    if (empty($fullname)) {
        $errorName = "Full name is required.";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errorName = "Only letters and spaces allowed.";
        $isValid = false;
    }

    // Email validation and conflict check
    $email = trim($_POST['email'] ?? '');
    if (empty($email)) {
        $errorEmail = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Invalid email format.";
        $isValid = false;
    } elseif ($email !== $user['email']) {
        // Check for conflict in DB
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE email = ?");
        $checkStmt->execute([$email]);
        if ($checkStmt->fetchColumn() > 0) {
            $errorEmail = "This email is already used by another account.";
            $isValid = false;
        }
    }

    // Phone validation
    $phone = trim($_POST['phone'] ?? '');
    if (empty($phone)) {
        $errorPhone = "Phone number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errorPhone = "Invalid phone number.";
        $isValid = false;
    }

    // Vehicle type
    $vehicle = $_POST['vehicle'] ?? '';
    if ($vehicle != "Car" && $vehicle != "Bike") {
        $errorVehicle = "Select valid vehicle type.";
        $isValid = false;
    }

    // Vehicle reg
    $vehicle_reg = trim($_POST['vehicle_reg'] ?? '');
    if (empty($vehicle_reg)) {
        $errorVehicleReg = "Vehicle registration number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[A-Za-z0-9\- ]{4,15}$/", $vehicle_reg)) {
        $errorVehicleReg = "Invalid vehicle registration number.";
        $isValid = false;
    }

    // License no
    $license_no = trim($_POST['license_no'] ?? '');
    if (empty($license_no)) {
        $errorLicenseNo = "License number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[A-Za-z0-9\- ]{4,20}$/", $license_no)) {
        $errorLicenseNo = "Invalid license number.";
        $isValid = false;
    }

    // Seats
    $seats = $_POST['seats'] ?? '';
    if (empty($seats)) {
        $errorSeats = "Seats are required.";
        $isValid = false;
    } elseif ($seats < 1 || $seats > 4) {
        $errorSeats = "Seats must be between 1 and 4.";
        $isValid = false;
    }

    // Route
    $route = htmlspecialchars(trim($_POST['route'] ?? ''));
    if (empty($route)) {
        $errorRoute = "Route is required.";
        $isValid = false;
    }

    // If all validation passes, update DB
    if ($isValid) {
        try {
            $stmt = $conn->prepare("UPDATE riders SET fullname = ?, email = ?, phone = ?, vehicle = ?, vehicle_reg = ?, license_no = ?, seats = ?, route = ? WHERE email = ?");
            $stmt->execute([$fullname, $email, $phone, $vehicle, $vehicle_reg, $license_no, $seats, $route, $user['email']]);
            $successMsg = "Profile updated successfully!";
            // Update session email if changed
            if ($email !== $user['email']) {
                $_SESSION['email'] = $email;
            }
        } catch (PDOException $e) {
            $errorEmail = "Error: " . $e->getMessage();
        }
    }
}