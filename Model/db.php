<?php
$host = "localhost";     // or "127.0.0.1"
$dbname = "unirider_db"; // change to your actual DB name
$username = "root";      // your DB username
$password = "";          // your DB password ('' if using XAMPP without password)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error reporting
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // Optional: for debugging
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
