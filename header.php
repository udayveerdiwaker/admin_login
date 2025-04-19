<?php
// Start output buffering
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | Gym Admin' : 'Gym Admin Panel'; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <!-- Main CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/header.css"> -->
    <link rel="stylesheet" href="header.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Custom CSS for this page -->
    <?php if (isset($custom_css)): ?>
        <style>
            <?php echo $custom_css; ?>
        </style>
    <?php endif; ?>

    <!-- Additional CSS files -->
    <?php if (isset($css_files)): ?>
        <?php foreach ($css_files as $css_file): ?>
            <link rel="stylesheet" href="<?php echo $css_file; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Gym Admin</p>
        </div>
    </div> -->

    <!-- Mobile menu overlay -->
    <div class="mobile-menu-overlay"></div>

    <!-- Notification alert -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success'];
            unset($_SESSION['success']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Main wrapper -->
    <div id="main-wrapper">
        <!-- Sidebar would be included here -->

        <!-- Main content area -->
        <div class="main-content">
            <!-- Top navbar -->
            <nav class="navbar">
                <div class="nav-left">
                    <div class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </div>

                    <div class="header-logo">
                        <a href="dashboard.php">
                            <img src="../assets/images/logo.png" alt="Gym Logo" class="logo">
                            <span class="brand-name">FitGym Pro</span>
                        </a>
                    </div>
                </div>

                <div class="nav-right">
                    <div class="search-box">
                        <form action="search.php" method="GET">
                            <input type="text" name="query" placeholder="Search...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <div class="nav-icons">
                        <div class="notification dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="badge">3</span>
                            <div class="dropdown-menu notification-dropdown">
                                <div class="dropdown-header">
                                    <h5>Notifications</h5>
                                    <a href="#" class="mark-all-read">Mark all as read</a>
                                </div>
                                <div class="dropdown-content">
                                    <a href="#" class="notification-item">
                                        <div class="notification-icon bg-primary">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="notification-text">
                                            <p>5 new members joined today</p>
                                            <span>10 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notification-item">
                                        <div class="notification-icon bg-success">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                        <div class="notification-text">
                                            <p>New payment received</p>
                                            <span>25 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notification-item">
                                        <div class="notification-icon bg-warning">
                                            <i class="fas fa-calendar-exclamation"></i>
                                        </div>
                                        <div class="notification-text">
                                            <p>Class starting in 30 minutes</p>
                                            <span>1 hour ago</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="notifications.php">View all notifications</a>
                                </div>
                            </div>
                        </div>

                        <div class="messages dropdown">
                            <i class="fas fa-envelope"></i>
                            <span class="badge">2</span>
                            <div class="dropdown-menu messages-dropdown">
                                <div class="dropdown-header">
                                    <h5>Messages</h5>
                                    <a href="#" class="mark-all-read">Mark all as read</a>
                                </div>
                                <div class="dropdown-content">
                                    <a href="#" class="message-item">
                                        <div class="message-avatar">
                                            <img src="../assets/images/users/user1.jpg" alt="User">
                                        </div>
                                        <div class="message-text">
                                            <h6>John Smith</h6>
                                            <p>About my membership renewal...</p>
                                            <span>2 hours ago</span>
                                        </div>
                                    </a>
                                    <a href="#" class="message-item">
                                        <div class="message-avatar">
                                            <img src="../assets/images/users/user2.jpg" alt="User">
                                        </div>
                                        <div class="message-text">
                                            <h6>Sarah Johnson</h6>
                                            <p>I want to change my trainer...</p>
                                            <span>4 hours ago</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="messages.php">View all messages</a>
                                </div>
                            </div>
                        </div>

                        <div class="user-profile dropdown">
                            <div class="profile-info">
                                <img src="<?php echo !empty($_SESSION['admin_profile_pic']) ? '../assets/images/users/' . $_SESSION['admin_profile_pic'] : '../assets/images/users/default.jpg'; ?>" alt="User">
                                <span class="user-name"><?php echo $_SESSION['admin_full_name'] ?? 'Admin'; ?></span>
                            </div>
                            <div class="dropdown-menu profile-dropdown">
                                <div class="dropdown-header">
                                    <div class="profile-summary">
                                        <img src="<?php echo !empty($_SESSION['admin_profile_pic']) ? '../assets/images/users/' . $_SESSION['admin_profile_pic'] : '../assets/images/users/default.jpg'; ?>" alt="User">
                                        <div class="profile-details">
                                            <h5><?php echo $_SESSION['admin_full_name'] ?? 'Admin'; ?></h5>
                                            <small><?php echo $_SESSION['admin_email'] ?? 'admin@example.com'; ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-content">
                                    <a href="profile.php" class="dropdown-item">
                                        <i class="fas fa-user"></i> My Profile
                                    </a>
                                    <a href="settings.php" class="dropdown-item">
                                        <i class="fas fa-cog"></i> Settings
                                    </a>
                                    <a href="activity-log.php" class="dropdown-item">
                                        <i class="fas fa-history"></i> Activity Log
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="../logout.php" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page content will be included here -->
            <div class="content-wrapper">