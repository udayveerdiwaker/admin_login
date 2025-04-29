<?php
// Database configuration

$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'gym_management';
$conn = mysqli_connect($server, $user, $pass, $dbname);

if ($conn) {
    // echo "Connection successfully";
} else {
    echo "Connection failed";
}

// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'gym_management');

// // Create database connection
// try {
//     $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Connection failed: " . $e->getMessage());
// }

// Set timezone
// date_default_timezone_set('UTC');

// // Start session
// session_start();

// // Base URL
// define('BASE_URL', 'http://localhost/gym-management/');
