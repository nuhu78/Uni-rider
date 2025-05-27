<?php
$con = mysqli_connect("127.0.0.1:3306", "root", "", "unirider_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $university_id =  $_POST['university_id'];
    $gender =  $_POST['gender'];
    $password =  $_POST['password'];
    $address =  $_POST['address'];
    $dob =  $_POST['dob'];
    $transport =  $_POST['transport'];
    $message = "ID: $id\\n";
$message .= "Full Name: $fullname\\n";
$message .= "Username: $username\\n";
$message .= "Email: $email\\n";
$message .= "Phone: $phone\\n";
$message .= "University ID: $university_id\\n";
$message .= "Gender: $gender\\n";
$message .= "Password: $password\\n";
$message .= "Address: $address\\n";
$message .= "Date of Birth: $dob\\n";
$message .= "Transport: $transport";

echo "<script>alert('$message');</script>";

    $sql = "UPDATE users SET 
                fullname='$fullname',
                username='$username',
                email='$email',
                phone='$phone',
                university_id='$university_id',
                gender='$gender',
                password='$password',
                address='$address',
                dob='$dob',
                transport='$transport'
            WHERE id=$id";

    mysqli_query($con, $sql);
    mysqli_close($con);

    header("Location: ../View/admin.php");
    exit();
}
?>
