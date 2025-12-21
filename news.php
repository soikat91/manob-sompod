<?php 
require_once 'config.php'; 
$news_result = $conn->query("SELECT * FROM news ORDER BY date DESC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>News - Manob Sompod</title>

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
    <section class="page-hero d-flex align-items-center">
      <div class="container mt-5 pt-4">
        <div class="row">
          <div class="col-lg-8">
            <h1 class="display-6 fw-bold mb-3">News &amp; <span class="text-gradient">Updates</span></h1>
            <p class="lead text-muted mb-0">
              Stay informed about our latest programs, achievements, partnerships, and upcoming events shaping human development across Bangladesh.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- News Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row g-4">
          <?php if($news_result->num_rows > 0): ?>
            <?php while($news = $news_result->fetch_assoc()): ?>
              <div class="col-md-4">
                <div class="news-card h-100">
                  <h6 class="mb-1"><?php echo htmlspecialchars($news['title']); ?></h6>
                  <small class="text-muted d-block mb-2">Published: <?php echo $news['date']; ?></small>
                  <p class="small text-muted mb-0">
                    <?php echo htmlspecialchars(substr($news['content'], 0, 150)); ?><?php if(strlen($news['content']) > 150) echo '...'; ?>
                  </p>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="col-12">
              <p class="text-center text-muted">No news available at the moment.</p>
            </div>
          <?php endif; ?>
        </div>

        <div class="row g-4 mt-1">
          <div class="col-md-6">
            <div class="info-card">
              <h5>Recent Achievements</h5>
              <ul class="small text-muted mb-0">
                <li><strong>October 2024:</strong> Completed leadership training for 250 women entrepreneurs in Sylhet and Chittagong divisions</li>
                <li><strong>September 2024:</strong> Published research report on "Digital Skills Gap in Rural Bangladesh"</li>
                <li><strong>August 2024:</strong> Received recognition from Ministry of Women and Children Affairs for outstanding contribution to women's empowerment</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-card">
              <h5>Stay Connected</h5>
              <p class="text-muted mb-3">
                Subscribe to our newsletter for regular updates on programs, research findings, and opportunities to get involved in our work.
              </p>
              <div class="d-flex gap-2">
                <a href="contact.php" class="btn btn-primary btn-sm">Subscribe Newsletter</a>
                <a href="gallery.php" class="btn btn-outline-primary btn-sm">View Activities</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>


  </body>
</html>


