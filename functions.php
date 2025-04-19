<?php
include 'config.php';

// Get total members count
function getTotalMembers()
{
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM members");
    return $stmt->fetchColumn();
}

// Get active members count
function getActiveMembers()
{
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'Active'");
    return $stmt->fetchColumn();
}

// Get monthly revenue
function getMonthlyRevenue()
{
    global $pdo;
    $current_month = date('m');
    $current_year = date('Y');
    $stmt = $pdo->prepare("SELECT SUM(amount) FROM payments WHERE status = 'Paid' AND MONTH(payment_date) = ? AND YEAR(payment_date) = ?");
    $stmt->execute([$current_month, $current_year]);
    return $stmt->fetchColumn() ?: 0;
}

// Get upcoming classes
function getUpcomingClasses()
{
    global $pdo;
    $today = date('Y-m-d');
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM classes WHERE schedule_date >= ? AND status = 'Scheduled'");
    $stmt->execute([$today]);
    return $stmt->fetchColumn();
}

// Get all members
function getAllMembers($limit = null)
{
    global $pdo;
    $sql = "SELECT * FROM members ORDER BY join_date DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Get member by ID
function getMemberById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM members WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Add new member
function addMember($data)
{
    global $pdo;

    // Generate member ID
    $member_id = 'GYM' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    $stmt = $pdo->prepare("INSERT INTO members (member_id, full_name, email, phone, address, date_of_birth, gender, join_date, membership_type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $member_id,
        $data['full_name'],
        $data['email'],
        $data['phone'],
        $data['address'],
        $data['date_of_birth'],
        $data['gender'],
        $data['join_date'],
        $data['membership_type'],
        $data['status']
    ]);
}

// Update member
function updateMember($id, $data)
{
    global $pdo;

    $stmt = $pdo->prepare("UPDATE members SET full_name = ?, email = ?, phone = ?, address = ?, date_of_birth = ?, gender = ?, join_date = ?, membership_type = ?, status = ? WHERE id = ?");
    return $stmt->execute([
        $data['full_name'],
        $data['email'],
        $data['phone'],
        $data['address'],
        $data['date_of_birth'],
        $data['gender'],
        $data['join_date'],
        $data['membership_type'],
        $data['status'],
        $id
    ]);
}

// Delete member
function deleteMember($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
    return $stmt->execute([$id]);
}

// Similar functions for trainers, classes, payments, etc.
// ... (implement similar CRUD functions for other entities)
