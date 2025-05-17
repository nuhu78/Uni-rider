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

    // If all validation passes, insert into DB
    if ($isValid) {
        require_once "../Model/db.php";

        try {
            // Check if email already exists
            $checkStmt = $conn->prepare("SELECT * FROM riders WHERE email = ?");
            $checkStmt->execute([$email]);

            if ($checkStmt->rowCount() > 0) {
                $errorEmail = "Email already registered.";
            } else {
                $stmt = $conn->prepare("INSERT INTO riders 
                    (fullname, email, phone, vehicle, vehicle_reg, license_no, seats, route, password)
                    VALUES 
                    (:fullname, :email, :phone, :vehicle, :vehicle_reg, :license_no, :seats, :route, :password)");

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':vehicle', $vehicle);
                $stmt->bindParam(':vehicle_reg', $vehicle_reg);
                $stmt->bindParam(':license_no', $license_no);
                $stmt->bindParam(':seats', $seats);
                $stmt->bindParam(':route', $route);
                $stmt->bindParam(':password', $hashedPassword);

                $stmt->execute();

                $successMessage = "Registration successful!";

                // Clear fields after success
                $fullname = $email = $phone = $vehicle = $vehicle_reg = $license_no = $seats = $route = "";
            }
        } catch (PDOException $e) {
            $errorEmail = "Error: " . $e->getMessage();
        }
    }
}
?>
