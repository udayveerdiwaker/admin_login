<?php
// include 'config.php';

// // Check if user is logged in
// function isLoggedIn()
// {
//     return isset($_SESSION['admin_id']);
// }

// // Redirect if not logged in
// function checkAuth()
// {
//     if (!isLoggedIn()) {
//         header("Location: ../login.php");
//         exit();
//     }
// }

// // Login function
// function login($username, $password)
// {
//     global $pdo;

//     $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
//     $stmt->execute([$username]);
//     $admin = $stmt->fetch();

//     if ($admin && password_verify($password, $admin['password'])) {
//         $_SESSION['admin_id'] = $admin['id'];
//         $_SESSION['admin_username'] = $admin['username'];
//         $_SESSION['admin_full_name'] = $admin['full_name'];
//         $_SESSION['admin_email'] = $admin['email'];
//         return true;
//     }
//     return false;
// }

// // Logout function
// function logout()
// {
//     session_unset();
//     session_destroy();
//     header("Location: login.php");
//     exit();
// }

// // Add a new admin (for initial setup)
// function addAdmin($username, $password, $full_name, $email)
// {
//     global $pdo;

//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//     $stmt = $pdo->prepare("INSERT INTO admins (username, password, full_name, email) VALUES (?, ?, ?, ?)");
//     return $stmt->execute([$username, $hashed_password, $full_name, $email]);
// }

session_start();

// Dummy user data (for demo purposes)
// Replace this with a DB query in production
$users = [
    'admin' => '$2y$10$F9nEO3X2fE5T7djQRbfOQeRXMPqIm4zKNbbiDQ9U5o6qPrSxiUAZe' // password: admin123
];

function isLoggedIn()
{
    return isset($_SESSION['user']);
}

function login($username, $password)
{
    global $users;

    if (isset($users[$username])) {
        if (password_verify($password, $users[$username])) {
            $_SESSION['user'] = $username;
            return true;
        }
    }
    return false;
}
