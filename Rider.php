<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rider Registration</title>
</head>
<body>
<center>
    <h2>Rider Registration Form</h2>
 
    <form action="Rider.php" method="get">
        <table border="1">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="tel" name="phone" required></td>
            </tr>
            <tr>
                <td>Vehicle Type:</td>
                <td>
                    <select name="vehicle">
                        <option value="Car">Car</option>
                        <option value="Bike">Bike</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Vehicle Registration Number:</td>
                <td><input type="text" name="vehicle_reg" required></td>
            </tr>
            <tr>
                <td>License Number:</td>
                <td><input type="text" name="license_no" required></td>
            </tr>
            <tr>
                <td>Available Seats:</td>
                <td><input type="number" name="seats" min="1" max="4"></td>
            </tr>
            <tr>
                <td>Preferred Route:</td>
                <td><input type="text" name="route"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Register">
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>