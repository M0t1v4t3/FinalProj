<?php
// admin_home.php
?>

<style>
    .admin-home-container {
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .admin-home-title {
        font-size: 32px;
        font-weight: bold;
        background: linear-gradient(to right, #f15e64, #e1758f);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
    }

    .admin-home-subtext {
        color: #555;
        font-size: 18px;
        margin-bottom: 30px;
    }

    .dashboard-cards {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .dashboard-card {
        background-color: #fff;
        border: 1px solid #eee;
        border-radius: 16px;
        padding: 25px;
        width: 280px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
    }

    .dashboard-card h3 {
        font-size: 22px;
        margin-bottom: 10px;
        color: #e1758f;
    }

    .dashboard-card p {
        font-size: 15px;
        color: #666;
    }
</style>

<div class="admin-home-container">
    <h2 class="admin-home-title">Welcome to the Admin Dashboard</h2>
    <p class="admin-home-subtext">Manage everything in one place: animals, adoptions, and volunteers.</p>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <h3>🐾 Manage Animals</h3>
            <p>Add, update, or remove animal profiles and track their status.</p>
        </div>
        <div class="dashboard-card">
            <h3>📄 Adoption Requests</h3>
            <p>View pending applications and approve or decline adoptions.</p>
        </div>
        <div class="dashboard-card">
            <h3>🙋‍♀️ Volunteers</h3>
            <p>Monitor and organize volunteer information and activities.</p>
        </div>
    </div>
</div>
