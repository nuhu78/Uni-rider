<?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
         $con = mysqli_connect("127.0.0.1:3306", "root", "", "unirider_db");

        if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header("Location: ../View/admin.php");
        exit();

     }

?>