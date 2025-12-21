<style>
    .sidebar { min-height: 100vh; background: #343a40; color: white; }
    .sidebar .nav-link { color: rgba(255,255,255,.75); padding: 0.75rem 1rem; }
    .sidebar .nav-link:hover { color: white; background: rgba(255,255,255,.1); }
    .sidebar .nav-link.active { color: white; background: #0d6efd; }
    .content { margin-left: 250px; }
</style>

<!-- Sidebar -->
<nav class="sidebar position-fixed">
    <div class="p-3">
        <h5 class="text-center mb-4"><i class="fas fa-cogs me-2"></i>Admin Panel</h5>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_news.php' ? 'active' : ''; ?>" href="manage_news.php"><i class="fas fa-newspaper me-2"></i>News</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_activities.php' ? 'active' : ''; ?>" href="manage_activities.php"><i class="fas fa-calendar-alt me-2"></i>Activities</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_services.php' ? 'active' : ''; ?>" href="manage_services.php"><i class="fas fa-concierge-bell me-2"></i>Services</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_team.php' ? 'active' : ''; ?>" href="manage_team.php"><i class="fas fa-users me-2"></i>Team Members</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_board.php' ? 'active' : ''; ?>" href="manage_board.php"><i class="fas fa-user-tie me-2"></i>Board Members</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_gallery.php' ? 'active' : ''; ?>" href="manage_gallery.php"><i class="fas fa-images me-2"></i>Gallery</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_content.php' ? 'active' : ''; ?>" href="manage_content.php"><i class="fas fa-edit me-2"></i>Content Pages</a></li>
            <li class="nav-item"><a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_contact.php' ? 'active' : ''; ?>" href="manage_contact.php"><i class="fas fa-address-book me-2"></i>Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-home me-2"></i>View Site</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
        </ul>
    </div>
</nav>