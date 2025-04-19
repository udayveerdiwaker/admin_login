<?php
require_once '../../includes/auth.php';
checkAuth();

require_once '../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'full_name' => $_POST['full_name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'date_of_birth' => $_POST['date_of_birth'],
        'gender' => $_POST['gender'],
        'join_date' => $_POST['join_date'],
        'membership_type' => $_POST['membership_type'],
        'status' => $_POST['status']
    ];

    if (addMember($data)) {
        $_SESSION['success'] = 'Member added successfully';
        header("Location: index.php");
        exit();
    } else {
        $error = 'Failed to add member';
    }
}

$page_title = "Add Member";
include_once '../../includes/header.php';
include_once '../../includes/sidebar.php';
?>

<div class="main-content">
    <?php include_once '../../includes/navbar.php'; ?>

    <div class="content">
        <div class="page-header">
            <h2>Add New Member</h2>
            <ul class="breadcrumb">
                <li><a href="../dashboard.php">Home</a></li>
                <li><a href="index.php">Members</a></li>
                <li>Add Member</li>
            </ul>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth">
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="join_date">Join Date</label>
                    <input type="date" id="join_date" name="join_date" required value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="membership_type">Membership Type</label>
                    <select id="membership_type" name="membership_type" required>
                        <option value="Basic">Basic</option>
                        <option value="Standard">Standard</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Expired">Expired</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Member</button>
                <a href="index.php" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php'; ?>