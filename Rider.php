<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rider Registration</title>
    <link rel="stylesheet" href="riderstyle.css">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="header">Uni-Rider</div>
    <center>
        <h2>Rider Registration Form</h2>

        <form action="Rider.php" method="get">
            <table border="1">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" id="fullname" required>
                        <span class="error" id="nameError"></span>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" id="email" required>
                        <span class="error" id="emailError"></span>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="tel" name="phone" id="phone" required>
                        <span class="error" id="phoneError"></span>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Type:</td>
                    <td>
                        <select name="vehicle" id="vehicle">
                            <option value="Car">Car</option>
                            <option value="Bike">Bike</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Registration Number:</td>
                    <td>
                        <input type="text" name="vehicle_reg" id="vehicle_reg" required>
                    </td>
                </tr>
                <tr>
                    <td>License Number:</td>
                    <td>
                        <input type="text" name="license_no" id="license_no" required>
                    </td>
                </tr>
                <tr>
                    <td>Available Seats:</td>
                    <td>
                        <input type="number" name="seats" id="seats" min="1" max="4">
                        <span class="error" id="seatError"></span>
                    </td>
                </tr>
                <tr>
                    <td>Preferred Route:</td>
                    <td>
                        <input type="text" name="route" id="route">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="password" required>
                        <span class="error" id="passwordError"></span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" id="confirm_password" required>
                        <span class="error" id="confirmPasswordError"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>
    </center>

    <script src="ridervalidation.js"></script>
</body>
</html>
