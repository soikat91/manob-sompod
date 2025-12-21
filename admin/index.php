<?php
session_start();
require_once '../config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get some stats
$stats = [];
$tables = ['news', 'activities', 'services', 'team_members', 'board_members', 'gallery'];
foreach ($tables as $table) {
    $result = $conn->query("SELECT COUNT(*) as count FROM $table");
    $stats[$table] = $result->fetch_assoc()['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manob Sompod</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
            padding: 0.75rem 1rem;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,.1);
        }
        .sidebar .nav-link.active {
            color: white;
            background: #0d6efd;
        }
        .content {
            margin-left: 250px;
        }
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar position-fixed">
        <div class="p-3">
            <h5 class="text-center mb-4">
                <i class="fas fa-cogs me-2"></i>Admin Panel
            </h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_news.php">
                        <i class="fas fa-newspaper me-2"></i>News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_activities.php">
                        <i class="fas fa-calendar-alt me-2"></i>Activities
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_services.php">
                        <i class="fas fa-concierge-bell me-2"></i>Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_team.php">
                        <i class="fas fa-users me-2"></i>Team Members
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_board.php">
                        <i class="fas fa-user-tie me-2"></i>Board Members
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_gallery.php">
                        <i class="fas fa-images me-2"></i>Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_content.php">
                        <i class="fas fa-edit me-2"></i>Content Pages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_contact.php">
                        <i class="fas fa-address-book me-2"></i>Contact Info
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link text-danger" href="logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
                <div>
                    <span class="text-muted">Welcome, <?php echo $_SESSION['admin_username']; ?>!</span>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card stat-card border-primary">
                        <div class="card-body text-center">
                            <i class="fas fa-newspaper fa-2x text-primary mb-2"></i>
                            <h4><?php echo $stats['news']; ?></h4>
                            <p class="text-muted mb-0">News Articles</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card stat-card border-success">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-alt fa-2x text-success mb-2"></i>
                            <h4><?php echo $stats['activities']; ?></h4>
                            <p class="text-muted mb-0">Activities</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card stat-card border-info">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x text-info mb-2"></i>
                            <h4><?php echo $stats['team_members']; ?></h4>
                            <p class="text-muted mb-0">Team Members</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card stat-card border-warning">
                        <div class="card-body text-center">
                            <i class="fas fa-images fa-2x text-warning mb-2"></i>
                            <h4><?php echo $stats['gallery']; ?></h4>
                            <p class="text-muted mb-0">Gallery Images</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fas fa-clock me-2"></i>Recent News</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $recent_news = $conn->query("SELECT title, date FROM news ORDER BY created_at DESC LIMIT 5");
                            if ($recent_news->num_rows > 0) {
                                while ($news = $recent_news->fetch_assoc()) {
                                    echo "<div class='mb-2'><strong>{$news['title']}</strong><br><small class='text-muted'>{$news['date']}</small></div>";
                                }
                            } else {
                                echo "<p class='text-muted'>No news articles yet.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fas fa-calendar me-2"></i>Recent Activities</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $recent_activities = $conn->query("SELECT title, date FROM activities ORDER BY created_at DESC LIMIT 5");
                            if ($recent_activities->num_rows > 0) {
                                while ($activity = $recent_activities->fetch_assoc()) {
                                    echo "<div class='mb-2'><strong>{$activity['title']}</strong><br><small class='text-muted'>{$activity['date']}</small></div>";
                                }
                            } else {
                                echo "<p class='text-muted'>No activities yet.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>