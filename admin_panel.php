<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Gym Admin Dashboard</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-dumbbell"></i>
            <h3>FitGym Pro</h3>
        </div>

        <div class="sidebar-menu">
            <h4>Main</h4>
            <ul>
                <li class="active">
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <span>Members</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Classes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user-tie"></i>
                        <span>Trainers</span>
                    </a>
                </li>
            </ul>

            <h4>Management</h4>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Payments</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-line"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <div class="navbar">
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>

            <div class="navbar-right">
                <div class="notification">
                    <i class="fas fa-bell"></i>
                    <span class="notification-count">3</span>
                </div>

                <div class="user-profile">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="page-header">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Dashboard</li>
                </ul>
            </div>

            <div class="cards">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Members</h3>
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-body">
                        <h2>1,254</h2>
                        <div class="card-footer">
                            <span>+12%</span> from last month
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Active Members</h3>
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-body">
                        <h2>872</h2>
                        <div class="card-footer">
                            <span>+8%</span> from last month
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Monthly Revenue</h3>
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-body">
                        <h2>$24,560</h2>
                        <div class="card-footer">
                            <span>+15%</span> from last month
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Upcoming Classes</h3>
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="card-body">
                        <h2>14</h2>
                        <div class="card-footer">
                            <span>Today</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
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
                        <tr>
                            <td>#GYM001</td>
                            <td>John Smith</td>
                            <td>Premium</td>
                            <td>Jan 12, 2023</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td><button class="logout-btn"><i class="fas fa-eye"></i> View</button></td>
                        </tr>
                        <tr>
                            <td>#GYM002</td>
                            <td>Sarah Johnson</td>
                            <td>Standard</td>
                            <td>Feb 5, 2023</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td><button class="logout-btn"><i class="fas fa-eye"></i> View</button></td>
                        </tr>
                        <tr>
                            <td>#GYM003</td>
                            <td>Michael Brown</td>
                            <td>Premium</td>
                            <td>Mar 18, 2023</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td><button class="logout-btn"><i class="fas fa-eye"></i> View</button></td>
                        </tr>
                        <tr>
                            <td>#GYM004</td>
                            <td>Emily Davis</td>
                            <td>Basic</td>
                            <td>Apr 2, 2023</td>
                            <td><span class="badge badge-danger">Expired</span></td>
                            <td><button class="logout-btn"><i class="fas fa-eye"></i> View</button></td>
                        </tr>
                        <tr>
                            <td>#GYM005</td>
                            <td>Robert Wilson</td>
                            <td>Standard</td>
                            <td>Apr 15, 2023</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td><button class="logout-btn"><i class="fas fa-eye"></i> View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>

</html>