<?php require_once 'config.php'; $team_result = $conn->query("SELECT * FROM team_members ORDER BY name"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Team - Manob Sompod</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Header -->
    <section class="page-hero d-flex align-items-center">
      <div class="container mt-5 pt-4">
        <div class="row">
          <div class="col-lg-8">
            <h1 class="display-6 fw-bold mb-3">Our <span class="text-gradient">Team</span></h1>
            <p class="lead text-muted mb-0">
              Meet the dedicated professionals driving Manob Sompod's mission of sustainable human development and community empowerment across Bangladesh.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Team Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row g-4">
          <?php while ($member = $team_result->fetch_assoc()) { ?>
          <div class="col-md-4">
            <div class="info-card h-100 text-center">
              <img
                src="<?php echo $member['image'] ?: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=300&q=80'; ?>"
                class="rounded-circle mb-3 img-fluid team-photo"
                alt="<?php echo $member['name']; ?>"
              />
              <h5><?php echo $member['name']; ?></h5>
              <p class="small text-muted mb-1"><?php echo $member['position']; ?></p>
              <p class="small text-muted mb-2">
                <?php echo $member['bio']; ?>
              </p>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="row g-4 mt-1">
          <div class="col-md-6">
            <div class="info-card h-100">
              <h5>Our Approach to Team Development</h5>
              <p class="text-muted mb-3">
                Our team combines deep local knowledge with international best practices in development work. We invest in continuous professional development and maintain strong networks with academia, government, and civil society.
              </p>
              <ul class="small text-muted mb-0">
                <li>Regular capacity building and skills upgrading</li>
                <li>Collaborative decision-making and transparent leadership</li>
                <li>Cross-functional expertise in multiple development sectors</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-card h-100">
              <h5>Advisory Support</h5>
              <p class="text-muted mb-3">
                Our leadership team is supported by experienced advisors from academia, government, and international development agencies who provide strategic guidance.
              </p>
              <div class="d-flex gap-2">
                <a href="board-members.php" class="btn btn-primary btn-sm">View Board Members</a>
                <a href="contact.php" class="btn btn-outline-primary btn-sm">Join Our Team</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

  </body>
</html>


