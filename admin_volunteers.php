<?php
// admin_volunteers.php
// Handle delete action if requested
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM volunteers WHERE id = $delete_id";
    if ($conn->query($delete_sql)) {
        $success_message = "Volunteer deleted successfully!";
    } else {
        $error_message = "Error deleting volunteer: " . $conn->error;
    }
}

// Get all volunteers
$sql = "SELECT * FROM volunteers ORDER BY signup_date DESC";
$result = $conn->query($sql);
?>

<style>
    .admin-volunteers-container {
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .admin-volunteers-title {
        font-size: 32px;
        font-weight: bold;
        background: linear-gradient(to right, #f15e64, #e1758f);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
        text-align: center;
    }

    .admin-volunteers-subtext {
        color: #555;
        font-size: 18px;
        margin-bottom: 30px;
        text-align: center;
    }

    .volunteers-table-container {
        background-color: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    .volunteers-table {
        width: 100%;
        border-collapse: collapse;
    }

    .volunteers-table th {
        background: linear-gradient(to right, #f15e64, #e1758f);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }

    .volunteers-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
        color: #555;
    }

    .volunteers-table tr:nth-child(even) {
        background-color: #fcfcfc;
    }

    .volunteers-table tr:hover {
        background-color: #f5f5f5;
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
        background-color: #4CAF50;
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

    .no-volunteers {
        text-align: center;
        padding: 30px;
        color: #666;
        font-size: 18px;
    }

    /* Success/Error Messages */
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

    /* Volunteer Details Modal */
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

    .modal-availability {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
</style>

<div class="admin-volunteers-container">
    <h2 class="admin-volunteers-title">Volunteer Management</h2>
    <p class="admin-volunteers-subtext">View and manage all registered volunteers for Saving Strays</p>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message ?></div>
    <?php endif; ?>
    
    <?php if (isset($error_message)): ?>
        <div class="alert alert-error"><?= $error_message ?></div>
    <?php endif; ?>

    <div class="volunteers-table-container">
        <?php if ($result && $result->num_rows > 0): ?>
            <table class="volunteers-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Signup Date</th>
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
                            <td><?= date('M j, Y', strtotime($row['signup_date'])) ?></td>
                            <td>
                                <a href="#" onclick="showVolunteerDetails(
                                    <?= $row['id'] ?>, 
                                    '<?= htmlspecialchars(addslashes($row['name'])) ?>', 
                                    '<?= htmlspecialchars(addslashes($row['email'])) ?>', 
                                    '<?= htmlspecialchars(addslashes($row['phone'])) ?>', 
                                    '<?= date('M j, Y', strtotime($row['signup_date'])) ?>',
                                    '<?= htmlspecialchars(addslashes($row['availability'])) ?>'
                                )" class="action-btn btn-view">View</a>
                                <a href="?section=volunteers&delete_id=<?= $row['id'] ?>" class="action-btn btn-delete" onclick="return confirm('Are you sure you want to permanently delete this volunteer?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-volunteers">
                <p>No volunteers have signed up yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Volunteer Details Modal -->
<div id="volunteerModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-header">
            <h3 id="modalVolunteerName"></h3>
        </div>
        <div class="modal-body">
            <p><strong>Email:</strong> <span id="modalVolunteerEmail"></span></p>
            <p><strong>Phone:</strong> <span id="modalVolunteerPhone"></span></p>
            <p><strong>Signup Date:</strong> <span id="modalVolunteerDate"></span></p>
            <div class="modal-availability">
                <h4>Availability Details:</h4>
                <p id="modalVolunteerAvailability"></p>
            </div>
        </div>
    </div>
</div>

<script>
    function showVolunteerDetails(id, name, email, phone, signupDate, availability) {
        document.getElementById('modalVolunteerName').textContent = name;
        document.getElementById('modalVolunteerEmail').textContent = email;
        document.getElementById('modalVolunteerPhone').textContent = phone || 'N/A';
        document.getElementById('modalVolunteerDate').textContent = signupDate;
        document.getElementById('modalVolunteerAvailability').textContent = availability || 'No availability information provided';
        document.getElementById('volunteerModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('volunteerModal').style.display = 'none';
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('volunteerModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>