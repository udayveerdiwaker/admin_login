<!-- <?php
        require_once 'auth.php';


        if (isLoggedIn()) {
            header("Location: admin/dashboard.php");
            exit();
        }

        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (empty($username) || empty($password)) {
                $error = 'Please enter both username and password';
            } else {
                if (login($username, $password)) {
                    header("Location: admin/dashboard.php");
                    exit();
                } else {
                    $error = 'Invalid username or password';
                }
            }
        }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Admin - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Gym Admin Panel</h1>
            <p>Please sign in to continue</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="login-form" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <div class="login-footer">
            <p>Don't have an account? <a href="#">Contact administrator</a></p>
        </div>
    </div>
</body>

</html> -->

<?php
require_once 'auth.php';

if (isLoggedIn()) {
    header("Location: admin/dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password';
    } else {
        if (login($username, $password)) {
            header("Location: admin/dashboard.php");
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gym Admin - Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Gym Admin Panel</h1>
            <p>Please sign in to continue</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="login-form" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <div class="login-footer">
            <p>Don't have an account? <a href="ragister.php">Ragister Now</a></p>
        </div>
        
    </div>
</body>

</html>