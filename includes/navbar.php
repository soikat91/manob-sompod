<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top custom-navbar">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
      <span class="brand-highlight">Manob</span> Sompod
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#mainNavbar"
      aria-controls="mainNavbar"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" aria-current="page" href="index.php">Home</a>
        </li>

        <!-- About Dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle <?php echo in_array(basename($_SERVER['PHP_SELF']), ['about.php', 'mission.php', 'team.php', 'board-members.php']) ? 'active' : ''; ?>"
            href="about.php"
            id="aboutDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            About
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutDropdown">
            <li><a class="dropdown-item" href="about.php">About Us</a></li>
            <li><a class="dropdown-item" href="mission.php">Our Mission</a></li>
            <li><a class="dropdown-item" href="team.php">Our Team</a></li>
            <li><a class="dropdown-item" href="board-members.php">Our Board Members</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'activities.php' ? 'active' : ''; ?>" href="activities.php">Activities</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" href="services.php">Services</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>" href="news.php">News</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gallery.php' ? 'active' : ''; ?>" href="gallery.php">Gallery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn btn-sm btn-outline-light ms-lg-3 px-3 <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
            Contact
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>