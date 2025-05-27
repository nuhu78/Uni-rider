<?php
session_unset();
session_destroy();
header("Location: ../View/admin_login.php");
exit();
?>