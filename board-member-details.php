<?php
require_once 'config.php';

// Get board member ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch board member data
$stmt = $conn->prepare("SELECT * FROM board_members WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$member = $result->fetch_assoc();
$stmt->close();

// If member not found, redirect to board members page
if (!$member) {
    header('Location: board-members.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo htmlspecialchars($member['name']); ?> - Board Member - Manob Sompod</title>

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

    <!-- Header -->
    <section class="hero-section d-flex align-items-center">
      <div class="container mt-5 pt-4">
        <div class="row">
          <div class="col-lg-8">
            <h1 class="display-6 fw-bold mb-3"><?php echo htmlspecialchars($member['name']); ?></h1>
            <p class="lead text-muted mb-0">
              <?php echo htmlspecialchars($member['position']); ?> - Board Member
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Details Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-4">
            <div class="info-card h-100 text-center">
              <img
                src="<?php echo htmlspecialchars($member['image'] ?: 'https://placehold.co/400x400'); ?>"
                class="rounded-circle mb-3 img-fluid board-photo-lg"
                alt="<?php echo htmlspecialchars($member['name']); ?>"
              />
              <h5><?php echo htmlspecialchars($member['name']); ?></h5>
              <p class="small text-muted mb-1"><?php echo htmlspecialchars($member['position']); ?></p>
              <p class="small text-muted mb-0">
                Board member of Manob Sompod, contributing to our mission of human resource development and community empowerment.
              </p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="info-card h-100">
              <h5>Biography</h5>
              <p class="text-muted mb-0">
                <?php echo nl2br(htmlspecialchars($member['bio'] ?: 'Biography information not available.')); ?>
              </p>
            </div>
          </div>
        </div>

        <div class="row g-4 mt-1">
          <div class="col-12">
            <a href="board-members.php" class="btn btn-outline-primary btn-sm">
              &larr; Back to Board Members
            </a>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>