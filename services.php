<?php require_once 'config.php'; $services_result = $conn->query("SELECT * FROM services ORDER BY created_at DESC"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Services - Manob Sompod</title>

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
    <section class="hero-section d-flex align-items-center">
      <div class="container mt-5 pt-4">
        <div class="row">
          <div class="col-lg-8">
            <h1 class="display-6 fw-bold mb-3">Our <span class="text-gradient">Professional Services</span></h1>
            <p class="lead text-muted mb-0">
              We provide comprehensive consulting and capacity building services to organizations, government agencies, and development partners seeking to enhance their human resource capabilities and program effectiveness.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row g-4">
          <?php if($services_result->num_rows > 0): ?>
            <?php while($service = $services_result->fetch_assoc()): ?>
              <div class="col-md-3 col-sm-6">
                <div class="service-card h-100">
                  <h6><?php echo htmlspecialchars($service['title']); ?></h6>
                  <p class="small text-muted mb-0">
                    <?php echo htmlspecialchars($service['description']); ?>
                  </p>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="col-12">
              <p class="text-center text-muted">No services available at the moment.</p>
            </div>
          <?php endif; ?>
        </div>

        <div class="row g-4 mt-1">
          <div class="col-12">
            <div class="info-card">
              <h5>Research & Policy Advocacy</h5>
              <p class="text-muted mb-0">
                Action research on social development issues, policy analysis and recommendations, advocacy campaign design, knowledge products development, and technical assistance for evidence-based programming and policy formulation.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>


