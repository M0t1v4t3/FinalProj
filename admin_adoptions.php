<?php
// admin_adoptions.php

// First, check if table exists with correct structure
$table_check = $conn->query("SHOW TABLES LIKE 'adoptions'");
if ($table_check->num_rows == 0) {
    $create_table = "CREATE TABLE adoptions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20),
        message TEXT NOT NULL,
        status ENUM('Pending', 'Approved', 'Disapproved') DEFAULT 'Pending',
        application_date DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($create_table);
}

// Handle approval if requested
if (isset($_GET['approve_id'])) {
    $approve_id = intval($_GET['approve_id']);
    $approve_sql = "UPDATE adoptions SET status = 'Approved' WHERE id = $approve_id";
    if ($conn->query($approve_sql)) {
        $success_message = "Adoption application approved successfully!";
    } else {
        $error_message = "Error approving application: " . $conn->error;
    }
}

// Handle disapproval if requested
if (isset($_GET['disapprove_id'])) {
    $disapprove_id = intval($_GET['disapprove_id']);
    $disapprove_sql = "UPDATE adoptions SET status = 'Disapproved' WHERE id = $disapprove_id";
    if ($conn->query($disapprove_sql)) {
        $success_message = "Adoption application disapproved successfully!";
    } else {
        $error_message = "Error disapproving application: " . $conn->error;
    }
}

// Handle delete if requested
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM adoptions WHERE id = $delete_id";
    if ($conn->query($delete_sql)) {
        $success_message = "Adoption application deleted successfully!";
    } else {
        $error_message = "Error deleting application: " . $conn->error;
    }
}

// Get all adoption applications
$sql = "SELECT * FROM adoptions ORDER BY application_date DESC";
$result = $conn->query($sql);
?>

<style>
    .admin-adoptions-container {
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .admin-adoptions-title {
        font-size: 32px;
        font-weight: bold;
        background: linear-gradient(to right, #f15e64, #e1758f);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
        text-align: center;
    }

    .admin-adoptions-subtext {
        color: #555;
        font-size: 18px;
        margin-bottom: 30px;
        text-align: center;
    }

    .adoptions-table-container {
        background-color: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    .adoptions-table {
        width: 100%;
        border-collapse: collapse;
    }

    .adoptions-table th {
        background: linear-gradient(to right, #f15e64, #e1758f);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }

    .adoptions-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
        color: #555;
    }

    .adoptions-table tr:nth-child(even) {
        background-color: #fcfcfc;
    }

    .adoptions-table tr:hover {
        background-color: #f5f5f5;
    }

    .status-pending {
        color: #FFA500;
        font-weight: bold;
    }

    .status-approved {
        color: #4CAF50;
        font-weight: bold;
    }

    .status-disapproved {
        color: #f44336;
        font-weight: bold;
    }

    .action-btn {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-right: 5px;
    }

    .btn-view {
        background-color: #2196F3;
        color: white;
    }

    .btn-approve {
        background-color: #4CAF50;
        color: white;
    }

    .btn-disapprove {
        background-color: #FF9800;
        color: white;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .no-adoptions {
        text-align: center;
        padding: 30px;
        color: #666;
        font-size: 18px;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
    }
    
    .alert-error {
        background-color: #f2dede;
        color: #a94442;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 25px;
        border-radius: 10px;
        width: 60%;
        max-width: 700px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover {
        color: #555;
    }

    .modal-header {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        margin-bottom: 15px;
    }

    .modal-body {
        padding: 10px 0;
    }

    .modal-body p {
        margin-bottom: 10px;
    }
</style>

<div class="admin-adoptions-container">
    <h2 class="admin-adoptions-title">Adoption Applications</h2>
    <p class="admin-adoptions-subtext">Review and manage all adoption applications</p>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message ?></div>
    <?php endif; ?>
    
    <?php if (isset($error_message)): ?>
        <div class="alert alert-error"><?= $error_message ?></div>
    <?php endif; ?>

    <div class="adoptions-table-container">
        <?php if ($result && $result->num_rows > 0): ?>
            <table class="adoptions-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Application Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['phone'] ?? 'N/A') ?></td>
                            <td class="status-<?= strtolower($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></td>
                            <td><?= date('M j, Y', strtotime($row['application_date'])) ?></td>
                            <td>
                                <a href="#" onclick="showApplicationDetails(
                                    <?= $row['id'] ?>, 
                                    '<?= htmlspecialchars(addslashes($row['name'])) ?>', 
                                    '<?= htmlspecialchars(addslashes($row['email'])) ?>', 
                                    '<?= htmlspecialchars(addslashes($row['phone'])) ?>', 
                                    '<?= htmlspecialchars(addslashes($row['message'])) ?>', 
                                    '<?= htmlspecialchars(addslashes($row['status'])) ?>',
                                    '<?= date('M j, Y', strtotime($row['application_date'])) ?>'
                                )" class="action-btn btn-view">View</a>
                                <?php if ($row['status'] == 'Pending'): ?>
                                    <a href="?section=adoptions&approve_id=<?= $row['id'] ?>" class="action-btn btn-approve" onclick="return confirm('Approve this adoption application?')">Approve</a>
                                    <a href="?section=adoptions&disapprove_id=<?= $row['id'] ?>" class="action-btn btn-disapprove" onclick="return confirm('Disapprove this adoption application?')">Disapprove</a>
                                <?php endif; ?>
                                <a href="?section=adoptions&delete_id=<?= $row['id'] ?>" class="action-btn btn-delete" onclick="return confirm('Permanently delete this application? This cannot be undone.')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-adoptions">
                <p>No adoption applications have been submitted yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Application Details Modal -->
<div id="applicationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-header">
            <h3 id="modalApplicantName"></h3>
            <p>Status: <span id="modalStatus"></span></p>
        </div>
        <div class="modal-body">
            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
            <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
            <p><strong>Application Date:</strong> <span id="modalDate"></span></p>
            <h4>Application Message:</h4>
            <p id="modalMessage"></p>
        </div>
    </div>
</div>

<script>
    function showApplicationDetails(id, name, email, phone, message, status, appDate) {
        document.getElementById('modalApplicantName').textContent = name;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalPhone').textContent = phone || 'N/A';
        document.getElementById('modalMessage').textContent = message;
        document.getElementById('modalStatus').textContent = status;
        document.getElementById('modalStatus').className = 'status-' + status.toLowerCase();
        document.getElementById('modalDate').textContent = appDate;
        document.getElementById('applicationModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('applicationModal').style.display = 'none';
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('applicationModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>