<?php require_once 'config.php'; $about_result = $conn->query("SELECT content FROM about WHERE id = 1"); $about_content = $about_result->fetch_assoc()['content'] ?? 'About content not set.'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About - Manob Sompod</title>

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
            <h1 class="display-6 fw-bold mb-3">About <span class="text-gradient">Manob Sompod</span></h1>
            <p class="lead text-muted mb-0">
              Discover our journey in human development, our commitment to community empowerment, and the dedicated team driving positive change across Bangladesh.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- About Main Content -->
    <section id="about" class="section-padding bg-light">
      <div class="container">
        <?php echo $about_content; ?>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>


  </body>
</html>


