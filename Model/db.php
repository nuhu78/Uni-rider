<?php
$db_host = "localhost";     // or "127.0.0.1"
$db_name = "unirider_db"; // change to your actual DB name
$db_user = "root";      // your DB username 
$db_pass = "";          // your DB password ('' if using XAMPP without password)

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // Set error reporting
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Optional: for debugging
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
