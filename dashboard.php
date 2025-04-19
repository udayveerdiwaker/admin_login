<?php
// Authentication check
include 'auth.php';
checkAuth(); // Make sure user is logged in

// Load helper functions
include 'functions.php';

// Fetch data for the dashboard
// $total_members = getTotalMembers();
// $active_members = getActiveMembers();
// $monthly_revenue = getMonthlyRevenue();
// $upcoming_classes = getUpcomingClasses();
// $recent_members = getAllMembers(5);

// Page setup
$page_title = "Dashboard";
// include 'header.php';
// include 'sidebar.php';
?>

<!-- Link to CSS -->
<link rel="stylesheet" href="admin.css">

<!-- Main Dashboard Content -->
<div class="main-content">

    <!-- Top Navigation Bar -->
    <div class="navbar">
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>

        <div class="navbar-right">
            <div class="notification">
                <i class="fas fa-bell"></i>
                <span class="notification-count">3</span>
            </div>

            <div class="user-profile dropdown">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" id="userDropdown">
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="content">
        <div class="page-header">
            <h2>Dashboard</h2>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>

        <div class="cards">
            <!-- Total Members -->
            <div class="card">
                <div class="card-header">
                    <h3>Total Members</h3>
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-body">
                    <h2><?php echo $total_members; ?></h2>
                    <div class="card-footer">+12% from last month</div>
                </div>
            </div>

            <!-- Active Members -->
            <div class="card">
                <div class="card-header">
                    <h3>Active Members</h3>
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="card-body">
                    <h2><?php echo $active_members; ?></h2>
                    <div class="card-footer">+8% from last month</div>
                </div>
            </div>

            <!-- Monthly Revenue -->
            <div class="card">
                <div class="card-header">
                    <h3>Monthly Revenue</h3>
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-body">
                    <h2>$<?php echo number_format($monthly_revenue, 2); ?></h2>
                    <div class="card-footer">+15% from last month</div>
                </div>
            </div>

            <!-- Upcoming Classes -->
            <div class="card">
                <div class="card-header">
                    <h3>Upcoming Classes</h3>
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="card-body">
                    <h2><?php echo $upcoming_classes; ?></h2>
                    <div class="card-footer">Today</div>
                </div>
            </div>
        </div>

        <!-- Recent Members Table -->
        <div class="table-responsive">
            <div class="table-header">
                <h3>Recent Members</h3>
                <a href="members/add.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Member</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Membership</th>
                        <th>Join Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_members as $member): ?>
                        <tr>
                            <td><?php echo $member['member_id']; ?></td>
                            <td><?php echo $member['full_name']; ?></td>
                            <td><?php echo $member['membership_type']; ?></td>
                            <td><?php echo date('M d, Y', strtotime($member['join_date'])); ?></td>
                            <td>
                                <?php
                                $badge_class = 'badge-danger';
                                if ($member['status'] == 'Active') {
                                    $badge_class = 'badge-success';
                                } elseif ($member['status'] == 'Pending') {
                                    $badge_class = 'badge-warning';
                                }
                                ?>
                                <span class="badge <?php echo $badge_class; ?>">
                                    <?php echo $member['status']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="members/view.php?id=<?php echo $member['id']; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>