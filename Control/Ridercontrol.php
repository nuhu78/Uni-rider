<?php
// initialize variables
$fullname = $email = $phone = $vehicle = $vehicle_reg = $license_no = $seats = $route = "";
$errorName = $errorEmail = $errorPhone = $errorVehicle = $errorVehicleReg = $errorLicenseNo = $errorSeats = $errorRoute = $errorPassword = $errorConfirmPassword = "";
$successMessage = "";

// validation runs only if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // full name validation
    $fullname = trim($_POST['fullname'] ?? '');
    if (empty($fullname)) {
        $errorName = "Full name is required.";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errorName = "Only letters and spaces allowed.";
        $isValid = false;
    }

    // email validation
    $email = trim($_POST['email'] ?? '');
    if (empty($email)) {
        $errorEmail = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Invalid email format.";
        $isValid = false;
    }

    // phone validation
    $phone = trim($_POST['phone'] ?? '');
    if (empty($phone)) {
        $errorPhone = "Phone number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errorPhone = "Invalid phone number.";
        $isValid = false;
    }

    // vehicle type
    $vehicle = $_POST['vehicle'] ?? '';
    if ($vehicle != "Car" && $vehicle != "Bike") {
        $errorVehicle = "Select valid vehicle type.";
        $isValid = false;
    }

    // vehicle reg
    $vehicle_reg = trim($_POST['vehicle_reg'] ?? '');
    if (empty($vehicle_reg)) {
        $errorVehicleReg = "Vehicle registration number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[A-Za-z0-9\- ]{4,15}$/", $vehicle_reg)) {
        $errorVehicleReg = "Invalid vehicle registration number.";
        $isValid = false;
    }

    // license no
    $license_no = trim($_POST['license_no'] ?? '');
    if (empty($license_no)) {
        $errorLicenseNo = "License number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[A-Za-z0-9\- ]{4,20}$/", $license_no)) {
        $errorLicenseNo = "Invalid license number.";
        $isValid = false;
    }

    // seats
    $seats = $_POST['seats'] ?? '';
    if (empty($seats)) {
        $errorSeats = "Seats are required.";
        $isValid = false;
    } elseif ($seats < 1 || $seats > 4) {
        $errorSeats = "Seats must be between 1 and 4.";
        $isValid = false;
    }

    // route
    $route = htmlspecialchars(trim($_POST['route'] ?? ''));
    if (empty($route)) {
        $errorRoute = "Route is required.";
        $isValid = false;
    }

    // password
    $password = $_POST['password'] ?? '';
    if (empty($password)) {
        $errorPassword = "Password is required.";
        $isValid = false;
    } elseif (strlen($password) < 6) {
        $errorPassword = "Password must be at least 6 characters.";
        $isValid = false;
    }

    // confirm password
    $confirm_password = $_POST['confirm_password'] ?? '';
    if (empty($confirm_password)) {
        $errorConfirmPassword = "Confirm password is required.";
        $isValid = false;
    } elseif ($password != $confirm_password) {
        $errorConfirmPassword = "Passwords do not match.";
        $isValid = false;
    }

    if ($isValid) {
        $successMessage = "Registration successful!";
        // optionally process/save data here
        // clear input fields
        $fullname = $email = $phone = $vehicle = $vehicle_reg = $license_no = $seats = $route = "";
    }
}
else {
    $fullname = $email = $phone = $vehicle = $vehicle_reg = $license_no = $seats = $route = "";
}

?>
