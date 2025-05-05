<?php include "../Control/Ridercontrol.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rider Registration</title>
    <link rel="stylesheet" href="../css/riderstyle.css">
</head>
<body>
    <div class="header">Uni-Rider</div>
    <center>
        <h2>Rider Registration Form</h2>
        <form action="../View/Rider.php" method="post">
            <table border="1">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" id="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
                        <span class="error" id="nameError"><?php echo $errorName; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                        <span class="error" id="emailError" ><?php echo $errorEmail; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>">
                        <span class="error" id= "phoneError"><?php echo $errorPhone; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Type:</td>
                    <td>
                        <select name="vehicle" id="vehicle">
                            <option value="Car" <?php if ($vehicle == "Car") echo "selected"; ?>>Car</option>
                            <option value="Bike" <?php if ($vehicle == "Bike") echo "selected"; ?>>Bike</option>
                        </select>
                        <span class="error"><?php echo $errorVehicle; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Registration Number:</td>
                    <td>
                        <input type="text" name="vehicle_reg" value="<?php echo htmlspecialchars($vehicle_reg); ?>">
                        <span class="error"><?php echo $errorVehicleReg; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>License Number:</td>
                    <td>
                        <input type="text" name="license_no" value="<?php echo htmlspecialchars($license_no); ?>">
                        <span class="error"><?php echo $errorLicenseNo; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Available Seats:</td>
                    <td>
                        <input type="number" name="seats" id="seats" min="1" max="4" value="<?php echo htmlspecialchars($seats); ?>">
                        <span class="error" id="seatError"><?php echo $errorSeats; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Preferred Route:</td>
                    <td>
                        <input type="text" name="route" value="<?php echo htmlspecialchars($route); ?>">
                        <span class="error"><?php echo $errorRoute; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="password">
                        <span class="error" id="passwordError"><?php echo $errorPassword; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password"id="confirm_password">
                        <span class="error"id="confirmPasswordError"><?php echo $errorConfirmPassword; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Register">
                    </td>
                </tr>
            </table>

            <?php
            if (!empty($successMessage)) {
                echo "<div class='success'>$successMessage</div>";
            }
            ?>
        </form>
    </center>

    <script src="../JS/ridervalidation.js"></script>
</body>
</html>
