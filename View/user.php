
<?php include "../Control/Usercontrol.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="../Css/userstyle.css">
</head>
<body>
  <div class="header">Uni-Rider</div>

  <center>
    <h2>User Registration Form</h2>

    <form id="userForm" action="user.php" method="post">
      <table border="1">
        <tr>
          <td>Full Name:</td>
          <td>
            <input type="text" name="fullname" id="fullname" value="<?= htmlspecialchars($_POST['fullname'] ?? '') ?>" required>
            <span class="error"><?= $errors['fullname'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Username:</td>
          <td>
            <input type="text" name="username" id="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
            <span class="error"><?= $errors['username'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <span class="error"><?= $errors['email'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Phone Number:</td>
          <td>
            <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" required>
            <span class="error"><?= $errors['phone'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Address:</td>
          <td><input type="text" name="address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>"></td>
        </tr>
        <tr>
          <td>University ID:</td>
          <td>
            <input type="text" name="university_id" id="university_id" value="<?= htmlspecialchars($_POST['university_id'] ?? '') ?>" required>
            <span class="error"><?= $errors['university_id'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Gender:</td>
          <td>
            <input type="radio" name="gender" value="Male" <?= (($_POST['gender'] ?? '') === 'Male') ? 'checked' : '' ?>> Male
            <input type="radio" name="gender" value="Female" <?= (($_POST['gender'] ?? '') === 'Female') ? 'checked' : '' ?>> Female
            <span class="error"><?= $errors['gender'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Date of Birth:</td>
          <td><input type="date" name="dob" value="<?= htmlspecialchars($_POST['dob'] ?? '') ?>"></td>
        </tr>
        <tr>
          <td>Preferred Transport:</td>
          <td>
            <select name="transport">
              <option value="Car" <?= (($_POST['transport'] ?? '') === 'Car') ? 'selected' : '' ?>>Car</option>
              <option value="Bike" <?= (($_POST['transport'] ?? '') === 'Bike') ? 'selected' : '' ?>>Bike</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <input type="password" name="password" id="password" required>
            <span class="error"><?= $errors['password'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td>Confirm Password:</td>
          <td>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <span class="error"><?= $errors['confirm_password'] ?? '' ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="Register">
          </td>
        </tr>
      </table>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
      <p style="color: green;">Registration successful!</p>
    <?php endif; ?>
  </center>
</body>
</html>
