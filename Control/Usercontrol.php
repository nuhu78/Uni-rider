<?php 
$errors = [];
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST["fullname"]);
    if (strlen($fullname) < 3) {
        $errors['fullname'] = "Full name must be at least 3 characters.";
    }


    $username = trim($_POST["username"]);
    if (empty($username) || preg_match('/\s/', $username)) {
        $errors['username'] = "Username cannot be empty or contain spaces.";
    }


    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }


    $phone = trim($_POST["phone"]);
    if (!preg_match('/^\d{10,15}$/', $phone)) {
        $errors['phone'] = "Enter a valid phone number (10-15 digits).";
    }

    $university_id = trim($_POST["university_id"]);
    if (strlen($university_id) < 4) {
        $errors['university_id'] = "University ID must be at least 4 characters.";
    }

    if (empty($_POST["gender"])) {
        $errors['gender'] = "Please select your gender.";
    } else {
        $gender = $_POST["gender"];
    }


    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    $dob = $_POST["dob"];
    $transport = $_POST["transport"];
    $address = $_POST["address"];

    // If no errors, process the form (e.g., save to database)
    if (empty($errors)) {
        $con = mysqli_connect("127.0.0.1:3306", "root", "", "unirider_db");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO users (fullname,username,email,phone,university_id,gender,password,address,dob,transport) VALUES
            ('$fullname', '$username', '$email', '$phone', '$university_id', '$gender', '$password','$address','$dob','$transport');";
            $obj = mysqli_query($con, $sql);
            if ($obj) {
                echo "<script>alert('Data inserted successfully');</script>";
                $_SESSION['is_success'] = true;
                header("Location: ../View/admin_login.php");
                //exit();
            } else {
                echo "<script>alert('Error inserting data');</script>";
            }
    }else {
        // Display errors
        
          //  echo "<span class='error'>$error</span><br>";
          //echo "<script>alert('Please fix the errors in the form.');</script>";
          foreach ($errors as $error) {
              echo "<script>alert('$error');</script>";
          }
        
    }
}
?>
