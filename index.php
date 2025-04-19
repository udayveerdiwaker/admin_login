<?php
require_once '../../includes/auth.php';
checkAuth();

require_once '../../includes/functions.php';

$members = getAllMembers();

$page_title = "Members";
include_once '../../includes/header.php';
include_once '../../includes/sidebar.php';
?>

<div class="main-content">
    <!-- Navbar (same as dashboard) -->
    <?php include_once '../../includes/navbar.php'; ?>
    
    <div class="content">
        <div class="page-header">
            <h2>Members</h2>
            <ul class="breadcrumb">
                <li><a href="../dashboard.php">Home</a></li>
                <li>Members</li>
            </ul>
        </div>
        
        <div class="actions">
            <a href="add.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Member</a>
        </div>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Membership</th>
                        <th>Join Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?php echo $member['member_id']; ?></td>
                        <td><?php echo $member['full_name']; ?></td>
                        <td><?php echo $member['email']; ?></td>
                        <td><?php echo $member['phone']; ?></td>
                        <td><?php echo $member['membership_type']; ?></td>
                        <td><?php echo date('M d, Y', strtotime($member['join_date'])); ?></td>
                        <td>
                            <span class="badge <?php 
                                echo $member['status'] == 'Active' ? 'badge-success' : 
                                     ($member['status'] == 'Pending' ? 'badge-warning' : 'badge-danger'); 
                            ?>">
                                <?php echo $member['status']; ?>
                            </span>
                        </td>
                        <td>
                            <a href="view.php?id=<?php echo $member['id']; ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="edit.php?id=<?php echo $member['id']; ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete.php?id=<?php echo $member['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once '../../includes/footer.php'; ?>