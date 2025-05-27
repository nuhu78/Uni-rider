<?php
if( isset($_SESSION['is_success']) && $_SESSION['is_success'] === true) {
    echo "<script>alert('Registration successful! Please login.');</script>";
    $_SESSION['is_success'] = false; 
}
require_once "../Control/admin_login_control.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../Css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if (!empty($loginError)) echo "<p class='error'>$loginError</p>"; ?>

        <form method="post" action="">
            <label for="role">Login As:</label>
            <select name="role" id="role">
                <option value="">-- Select --</option>
                <option value="User" <?= ($role === "User") ? "selected" : "" ?>>User</option>
                <option value="Rider" <?= ($role === "Rider") ? "selected" : "" ?>>Rider</option>
                <option value="admin" <?= ($role === "Rider") ? "selected" : "" ?>>Admin</optiobn>
            </select>
            <span class="error"><?= $errorRole ?></span>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
            <span class="error"><?= $errorEmail ?></span>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <span class="error"><?= $errorPassword ?></span>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
