<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
</head>
<body>
    <center>

    <h2>User Registration Form</h2>

    <form action="user.php" method="get">
        <table border="1">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required></td>   
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
                <td>Address:</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>University ID:</td>
                <td><input type="text" name="university_id" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="dob"></td>
            </tr>
            <tr>
                <td>Preferred Transport:</td>
                <td>
                    <select name="transport">
                       
                        <option value="Car">Car</option>
                        <option value="Bike">Bike</option>
                       
                    </select>
                </td>
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
