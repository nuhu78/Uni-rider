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
        <?php if (!empty($successMsg)): ?>
            <div class="success-message" id="successMsg"><?= htmlspecialchars($successMsg) ?></div>
            <script>
                setTimeout(function() {
                    document.getElementById('successMsg').style.display = 'none';
                }, 3000);
            </script>
        <?php endif; ?>
        <div class="profile-picture-section">
            <img src="<?= $profilePic ?>" alt="Profile Picture" class="profile-picture">
            <form class="photo-form" method="post" enctype="multipart/form-data">
                <input type="file" name="profile_picture" accept="image/*" required>
                <button type="submit" name="upload_photo">
                    <?= empty($user['profile_picture']) ? "Add Photo" : "Update Photo" ?>
                </button>
            </form>
        </div>
        <?php if ($user): ?>
            <table>
                <?php foreach ($profileData as $key => $value): ?>
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