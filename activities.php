<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activities - Manob Sompod</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-hero">
      <div class="container">
        <div class="row align-items-center gy-4">
          <div class="col-lg-7">
            <div class="pill mb-3">Programs &amp; Impact</div>
            <h1 class="display-6 fw-bold mb-3">Our <span class="text-gradient">Activities</span></h1>
            <p class="lead text-muted mb-4">
              We implement comprehensive human development programs that build individual capabilities, strengthen communities, and create sustainable pathways to economic empowerment across Bangladesh.
            </p>
            <div class="d-flex flex-wrap gap-2">
              <a href="contact.php" class="btn btn-primary px-4">Partner with us</a>
              <a href="news.php" class="btn btn-outline-primary px-4">See recent updates</a>
            </div>
          </div>
          <div class="col-lg-5 text-center">
            <img
              src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&auto=format&fit=crop&w=520&h=360&q=80"
              class="img-fluid rounded-3 shadow-lg"
              alt="Community development activities"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Activities Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="section-title">Key <span>Programs</span></h2>
            <p class="text-muted">
              Flagship activities that we run year-round to develop people and empower communities.
            </p>
          </div>
        </div>

        <div class="row g-4">
          <?php
          $result = $conn->query("SELECT * FROM activities ORDER BY date DESC");
          if ($result->num_rows > 0) {
              while ($activity = $result->fetch_assoc()) {
                  echo '<div class="col-md-4">';
                  echo '<div class="activity-card h-100">';
                  echo '<span class="icon-badge">🎯</span>';
                  echo '<h5>' . htmlspecialchars($activity['title']) . '</h5>';
                  echo '<p class="activity-meta mb-2">' . date('M j, Y', strtotime($activity['date'])) . '</p>';
                  echo '<p class="text-muted mb-0">' . htmlspecialchars($activity['description']) . '</p>';
                  echo '</div>';
                  echo '</div>';
              }
          } else {
              echo '<div class="col-12 text-center">';
              echo '<p class="text-muted">No activities available at the moment.</p>';
              echo '</div>';
          }
          ?>
        </div>

        <div class="row g-4 mt-4">
          <div class="col-md-6 col-lg-4">
            <div class="info-card h-100">
              <h6 class="text-uppercase text-muted mb-2">Delivery Model</h6>
              <h5>How we work</h5>
              <ul class="text-muted small mb-0">
                <li>Participatory program design with community involvement</li>
                <li>Multi-modal delivery: face-to-face, digital, and mobile approaches</li>
                <li>Results-based monitoring and continuous learning systems</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="info-card h-100">
              <h6 class="text-uppercase text-muted mb-2">Impact Snapshot</h6>
              <h5>Recent highlights</h5>
              <ul class="text-muted small mb-0">
                <li>8,500+ individuals trained in professional and life skills</li>
                <li>35 community development projects implemented in 2024</li>
                <li>12 research studies and policy briefs published</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="info-card h-100">
              <h6 class="text-uppercase text-muted mb-2">Get Involved</h6>
              <h5>Work with us</h5>
              <p class="text-muted mb-3">
                We partner with NGOs, government agencies, international donors, and private sector organizations to design and implement customized development programs that meet specific community needs.
              </p>
              <div class="d-flex flex-wrap gap-2">
                <a href="contact.php" class="btn btn-primary btn-sm px-3">Contact us</a>
                <a href="services.php" class="btn btn-outline-primary btn-sm px-3">View services</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>


