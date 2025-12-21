<?php require_once 'config.php'; $mission_result = $conn->query("SELECT content FROM mission WHERE id = 1"); $mission_content = $mission_result->fetch_assoc()['content'] ?? 'Mission content not set.'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Mission - Manob Sompod</title>

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
            <h1 class="display-6 fw-bold mb-3">Our <span class="text-gradient">Mission</span></h1>
            <p class="lead text-muted mb-0">
              Empowering individuals and communities through sustainable human development initiatives that create lasting positive change across Bangladesh.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Mission Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <?php echo $mission_content; ?>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>


  </body>
</html>


