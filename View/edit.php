<?php
session_start();
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin']==false){
    echo "<script>alert('Please Login First')</script>";
    exit();
 }
$con = mysqli_connect("127.0.0.1:3306", "root", "", "unirider_db");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = intval($_POST['id']);
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
$fullname = $data['fullname'];
$username = $data['username'];
$email = $data['email'] ;
$phone = $data['phone'];
$university_id = $data['university_id'] ;
$gender = $data['gender'] ;
$password = $data['password'] ;
$address = $data['address'] ;
$dob = $data['dob'] ;
$transport = $data['transport'] ;






?>

    <form method="post" action="../Control/update.php" onsubmit="return valid()">
            <table style="margin-left: 30px;" class="reg-form">
                <tr>
            <td>Full Name:</td>
            <td>
                <input type="text" name="fullname" id="fullname" value="<?= htmlspecialchars($fullname) ?>" required>
            </td>
        </tr>
        <tr>
            <td>Username:</td>
            <td>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($username) ?>" required>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
            </td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td>
                <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($phone) ?>" required>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>
                <input type="text" name="address" id="address" value="<?= htmlspecialchars($address) ?>">
            </td>
        </tr>
        <tr>
            <td>University ID:</td>
            <td>
                <input type="text" name="university_id" id="university_id" value="<?= htmlspecialchars($university_id) ?>" required>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gender" value="Male" <?= ($gender === 'Male') ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female" <?= ($gender === 'Female') ? 'checked' : '' ?>> Female
            </td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td>
                <input type="date" name="dob" id="dob" value="<?= htmlspecialchars($dob) ?>">
            </td>
        </tr>
        <tr>
            <td>Preferred Transport:</td>
            <td>
                <select name="transport" id="transport">
                    <option value="Car" <?= ($transport === 'Car') ? 'selected' : '' ?>>Car</option>
                    <option value="Bike" <?= ($transport === 'Bike') ? 'selected' : '' ?>>Bike</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="password" id="password" value="<?= htmlspecialchars($password) ?>" required>
            </td>
        </tr>
        <tr>

            <td>Confirm Password:</td>
            <td>
                <input type="hidden" name="id"value="<?= htmlspecialchars($id) ?>">
                <input type="password" name="confirm_password" id="confirm_password" value="<?= htmlspecialchars($password) ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Update">
            </td>
        </tr>
            </table>
            <label  for="" id="error"></label>
            <input type="hidden" name="form_name" value="f1">
             </form>
            