<?php
session_start();
require_once "../Control/updateprofilecontrol.php"; // sets $fullname, $email, etc. and error variables
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="../Css/updateprofile.css">
</head>
<body>
    <div class="update-profile-container">
        <h2>Update Profile</h2>
        <?php if (!empty($successMsg)): ?>
            <div class="success-message" id="successMsg"><?= htmlspecialchars($successMsg) ?></div>
            <script>
                setTimeout(function() {
                    document.getElementById('successMsg').style.display = 'none';
                }, 3000);
            </script>
        <?php endif; ?>
        <form method="post" action="">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" value="<?= htmlspecialchars($fullname) ?>">
                        <span class="error"><?= $errorName ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" readonly>
                        <span class="error"><?= $errorEmail ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="tel" name="phone" value="<?= htmlspecialchars($phone) ?>">
                        <span class="error"><?= $errorPhone ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Type:</td>
                    <td>
                        <select name="vehicle">
                            <option value="Car" <?= ($vehicle == "Car") ? "selected" : "" ?>>Car</option>
                            <option value="Bike" <?= ($vehicle == "Bike") ? "selected" : "" ?>>Bike</option>
                        </select>
                        <span class="error"><?= $errorVehicle ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Registration Number:</td>
                    <td>
                        <input type="text" name="vehicle_reg" value="<?= htmlspecialchars($vehicle_reg) ?>">
                        <span class="error"><?= $errorVehicleReg ?></span>
                    </td>
                </tr>
                <tr>
                    <td>License Number:</td>
                    <td>
                        <input type="text" name="license_no" value="<?= htmlspecialchars($license_no) ?>">
                        <span class="error"><?= $errorLicenseNo ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Available Seats:</td>
                    <td>
                        <input type="number" name="seats" min="1" max="4" value="<?= htmlspecialchars($seats) ?>">
                        <span class="error"><?= $errorSeats ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Preferred Route:</td>
                    <td>
                        <input type="text" name="route" value="<?= htmlspecialchars($route) ?>">
                        <span class="error"><?= $errorRoute ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="update_profile" value="Update">
                    </td>
                </tr>
            </table>
        </form>
        <div class="form-group">
            <a href="profile.php" class="back-link">Back to Profile</a>
        </div>
    </div>
</body>
</html>