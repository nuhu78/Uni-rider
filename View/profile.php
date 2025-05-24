<?php
session_start();
require_once "../Control/profilecontrol.php"; // $user is set here
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../Css/profile.css">
</head>
<body>
    <div class="profile-container">
        <h2>Your Profile</h2>
        <?php if ($user): ?>
            <table>
                <?php foreach ($user as $key => $value): ?>
                    <?php if (in_array($key, ['id', 'password', 'registered_at'])) continue; ?>
                    <tr>
                        <th><?= htmlspecialchars(ucwords(str_replace('_', ' ', $key))) ?></th>
                        <td><?= htmlspecialchars($value) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="profile-actions">
                <form method="post" action="">
                    <button type="submit" name="update_profile">Update Profile</button>
                    <button type="submit" name="delete_account" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
                </form>
            </div>
        <?php else: ?>
            <p class="error">User not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>