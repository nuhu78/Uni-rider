<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="../Css/userstyle.css">
  <script src="../JS/uservalidation.js" defer></script>
</head>
<body>
  <div class="header">Uni-Rider</div>
 
  <center>
    <h2>User Registration Form</h2>
 
    <form id="userForm" action="user.php" method="get">
      <table border="1">
        <tr>
          <td>Full Name:</td>
          <td>
            <input type="text" name="fullname" id="fullname" required>
            <span id="fullnameError" class="error"></span>
          </td>
        </tr>
        <tr>
          <td>Username:</td>
          <td>
            <input type="text" name="username" id="username" required>
            <span id="usernameError" class="error"></span>
          </td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
            <input type="email" name="email" id="email" required>
            <span id="emailError" class="error"></span>
          </td>
        </tr>
        <tr>
          <td>Phone Number:</td>
          <td>
            <input type="tel" name="phone" id="phone" required>
            <span id="phoneError" class="error"></span>
          </td>
        </tr>
        <tr>
          <td>Address:</td>
          <td><input type="text" name="address"></td>
        </tr>
        <tr>
          <td>University ID:</td>
          <td>
            <input type="text" name="university_id" id="university_id" required>
            <span id="universityIdError" class="error"></span>
          </td>
        </tr>
        <tr>
          <td>Gender:</td>
          <td>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <span id="genderError" class="error"></span>
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
          <td>
            <input type="password" name="password" id="password" required>
            <span id="passwordError" class="error"></span>
          </td>
        </tr>
        <tr>
          <td>Confirm Password:</td>
          <td>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <span id="confirmPasswordError" class="error"></span>
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
</body>
</html>
 