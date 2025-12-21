<?php require_once 'config.php'; $board_result = $conn->query("SELECT * FROM board_members ORDER BY name"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Board Members - Manob Sompod</title>

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
            <h1 class="display-6 fw-bold mb-3">Our Board <span class="text-gradient">Members</span></h1>
            <p class="lead text-muted mb-0">
              Meet the distinguished leaders and experts who provide strategic guidance and governance oversight to Manob Sompod's mission and operations.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Board Members List -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row g-4">
          <?php while ($member = $board_result->fetch_assoc()) { ?>
          <div class="col-md-4">
            <div class="info-card h-100 text-center">
              <img
                src="<?php echo $member['image'] ?: 'https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=300&q=80'; ?>"
                class="rounded-circle mb-3 img-fluid board-photo"
                alt="<?php echo $member['name']; ?>"
              />
              <h5><?php echo $member['name']; ?></h5>
              <p class="small text-muted mb-1"><?php echo $member['position']; ?></p>
              <p class="small text-muted mb-2">
                <?php echo $member['bio']; ?>
              </p>
              <a href="board-member-details.php?id=<?php echo $member['id']; ?>" class="btn btn-sm btn-primary">Details</a>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="row g-4 mt-1">
          <div class="col-md-6">
            <div class="info-card h-100">
              <h5>Board Governance</h5>
              <p class="text-muted mb-3">
                Our Board of Directors meets quarterly to review organizational performance, approve strategic initiatives, and ensure compliance with regulatory requirements and best practices in development sector.
              </p>
              <ul class="small text-muted mb-0">
                <li>Strategic planning and policy oversight</li>
                <li>Financial management and audit supervision</li>
                <li>Program evaluation and impact assessment</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-card h-100">
              <h5>Advisory Committee</h5>
              <p class="text-muted mb-3">
                Our board is supported by distinguished advisors from academia, government, and international organizations who provide technical expertise and strategic guidance.
              </p>
              <div class="d-flex gap-2">
                <a href="team.php" class="btn btn-primary btn-sm">Meet Our Team</a>
                <a href="about.php" class="btn btn-outline-primary btn-sm">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>


  </body>
</html>


