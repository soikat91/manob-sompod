<?php
require_once 'config.php';

// Fetch latest news (limit 3)
$latest_news_query = "SELECT * FROM news ORDER BY created_at DESC LIMIT 3";
$latest_news_result = $conn->query($latest_news_query);

// Fetch latest activities (limit 3)
$latest_activities_query = "SELECT * FROM activities ORDER BY created_at DESC LIMIT 3";
$latest_activities_result = $conn->query($latest_activities_query);

// Fetch services
$services_query = "SELECT * FROM services ORDER BY created_at DESC LIMIT 6";
$services_result = $conn->query($services_query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manob Sompod</title>

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

    <!-- Hero / Home Section -->
    <section id="home" class="hero-section d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <!-- <div class="pill mb-3">🌟 Empowering Bangladesh Since 2005</div> -->
            <h1 class="display-4 fw-bold mb-4">
              Building a <span class="text-gradient">Stronger Bangladesh</span> Through Human Development
            </h1>
            <p class="lead text-muted mb-4 section-subtitle">
              We empower communities across Bangladesh through evidence-based programs in skills development, capacity building, and social innovation. Join us in creating sustainable change that transforms lives.
            </p>
            <div class="d-flex flex-wrap gap-3 mb-4">
              <a href="about.php" class="btn btn-primary btn-lg px-4">
                <span class="me-2">📖</span> Our Story
              </a>
              <a href="activities.php" class="btn btn-outline-primary btn-lg px-4">
                <span class="me-2"></span> View Programs
              </a>
            </div>
            <!-- <div class="d-flex flex-wrap gap-4 small text-muted">
              <div><strong>250+</strong> Training Programs</div>
              <div><strong>15,000+</strong> Lives Impacted</div>
              <div><strong>18+</strong> Years Experience</div>
            </div> -->
          </div>
          <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="hero-image-container position-relative">
              <img
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                class="hero-illustration img-fluid"
                alt="Team collaboration and human development"
              />
              <div class="hero-badge">
                <div class="badge-content">
                  <div class="badge-number">15,000+</div>
                  <div class="badge-text">Lives Transformed</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Impact Statistics -->
        <div class="row g-4 mt-5">
          <div class="col-12">
            <div class="stats-container">
              <div class="row g-3 g-lg-4">
                <div class="col-6 col-lg-3">
                  <div class="stat-card text-center">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-value">250+</div>
                    <div class="stat-label">Training Programs</div>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-card text-center">
                    <div class="stat-icon">📈</div>
                    <div class="stat-value">65+</div>
                    <div class="stat-label">Development Projects</div>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-card text-center">
                    <div class="stat-icon">👥</div>
                    <div class="stat-value">15,000+</div>
                    <div class="stat-label">Lives Impacted</div>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-card text-center">
                    <div class="stat-icon">🏆</div>
                    <div class="stat-value">18+</div>
                    <div class="stat-label">Years of Excellence</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="about-image-grid">
              <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="grid-img-1" alt="Community meeting">
              <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="grid-img-2" alt="Training session">
              <div class="experience-badge">
                <div class="experience-number">18+</div>
                <div class="experience-text">Years of Impact</div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="pill mb-3">✨ Who We Are</div>
            <h2 class="section-title mb-4">Creating Lasting <span>Impact</span> Since 2005</h2>
            <p class="text-muted mb-4">
              Manob Sompod is Bangladesh's leading organization for human resource development. We transform communities through evidence-based programs, innovative training methodologies, and strategic partnerships.
            </p>
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <div class="feature-item">
                  <div class="feature-icon">🎯</div>
                  <div>
                    <h6 class="mb-1">Evidence-Based</h6>
                    <small class="text-muted">Research-driven interventions</small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="feature-item">
                  <div class="feature-icon">🤝</div>
                  <div>
                    <h6 class="mb-1">Community-Centered</h6>
                    <small class="text-muted">Participatory development approach</small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="feature-item">
                  <div class="feature-icon">📊</div>
                  <div>
                    <h6 class="mb-1">Impact-Focused</h6>
                    <small class="text-muted">Measurable outcomes and sustainability</small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="feature-item">
                  <div class="feature-icon">🌍</div>
                  <div>
                    <h6 class="mb-1">Nationwide Reach</h6>
                    <small class="text-muted">Operations across Bangladesh</small>
                  </div>
                </div>
              </div>
            </div>
            <a href="about.php" class="btn btn-primary px-4">Learn More About Us</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Success Stories Section -->
    <section class="section-padding bg-primary text-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="pill mb-3 bg-white text-primary">🌟 Success Story</div>
            <h2 class="display-6 fw-bold mb-4">Empowering Women Entrepreneurs in Rural Bangladesh</h2>
            <p class="mb-4 opacity-90">
              Through our women's entrepreneurship program, Rashida Begum from Sylhet transformed from a homemaker to a successful business owner, now employing 15 women in her garment unit.
            </p>
            <div class="d-flex gap-4 mb-4">
              <div class="text-center">
                <div class="h4 fw-bold">250+</div>
                <small class="opacity-75">Women Trained</small>
              </div>
              <div class="text-center">
                <div class="h4 fw-bold">180+</div>
                <small class="opacity-75">Businesses Started</small>
              </div>
              <div class="text-center">
                <div class="h4 fw-bold">₹50L+</div>
                <small class="opacity-75">Revenue Generated</small>
              </div>
            </div>
            <a href="gallery.php" class="btn btn-light btn-lg px-4">View More Stories</a>
          </div>
          <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                 class="img-fluid rounded-3" alt="Women entrepreneur success story">
          </div>
        </div>
      </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="section-padding">
      <div class="container">
        <div class="text-center mb-5">
          <div class="pill mb-3">🚀 Our Programs</div>
          <h2 class="section-title mb-3">Transformative <span>Programs</span> for Sustainable Development</h2>
          <p class="text-muted col-lg-8 mx-auto">
            We design and implement comprehensive programs that address root causes of social challenges and create lasting positive change in communities.
          </p>
        </div>

        <div class="row g-4">
          <?php while ($activity = $latest_activities_result->fetch_assoc()) { ?>
          <div class="col-lg-4 col-md-6">
            <div class="program-card h-100">
              <div class="program-header">
                <div class="program-icon">🎯</div>
                <div>
                  <h5 class="mb-1"><?php echo htmlspecialchars($activity['title']); ?></h5>
                  <small class="text-muted"><?php echo date('M d, Y', strtotime($activity['date'])); ?></small>
                </div>
              </div>
              <p class="text-muted mb-3">
                <?php echo htmlspecialchars(substr($activity['description'], 0, 150)) . '...'; ?>
              </p>
              <a href="activities.php" class="btn btn-outline-primary btn-sm mt-3">Learn More</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Partnership Section -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="text-center mb-5">
          <div class="pill mb-3">🤝 Our Partners</div>
          <h2 class="section-title mb-3">Working Together for <span>Greater Impact</span></h2>
          <p class="text-muted col-lg-8 mx-auto">
            We collaborate with leading organizations, government agencies, and international partners to amplify our impact and reach.
          </p>
        </div>
        <div class="row g-4 align-items-center">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="partner-logo">
              <div class="partner-placeholder">UNDP Bangladesh</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="partner-logo">
              <div class="partner-placeholder">World Bank</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="partner-logo">
              <div class="partner-placeholder">Government of Bangladesh</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="partner-logo">
              <div class="partner-placeholder">European Union</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section-padding bg-light">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="section-title">Our <span>Services</span></h2>
            <p class="text-muted">
              Professional consulting and capacity building services for organizations, government agencies, and international development partners.
            </p>
          </div>
        </div>

        <div class="row g-4">
          <?php while ($service = $services_result->fetch_assoc()) { ?>
          <div class="col-md-3 col-sm-6">
            <div class="service-card h-100">
              <span class="icon-badge">🧭</span>
              <h6><?php echo htmlspecialchars($service['title']); ?></h6>
              <p class="small text-muted mb-0">
                <?php echo htmlspecialchars(substr($service['description'], 0, 100)) . '...'; ?>
              </p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Latest News Section -->
    <section id="news" class="section-padding">
      <div class="container">
        <div class="text-center mb-5">
          <div class="pill mb-3">📰 Latest News</div>
          <h2 class="section-title mb-3">Stay Updated with Our <span>Latest News</span></h2>
          <p class="text-muted col-lg-8 mx-auto">
            Read about our recent activities, achievements, and insights in human development and community empowerment.
          </p>
        </div>

        <div class="row g-4">
          <?php while ($news = $latest_news_result->fetch_assoc()) { ?>
          <div class="col-lg-4 col-md-6">
            <div class="news-card h-100">
              <?php if ($news['image']) { ?>
              <img src="<?php echo htmlspecialchars($news['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($news['title']); ?>">
              <?php } ?>
              <div class="card-body">
                <h6 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h6>
                <p class="card-text"><?php echo htmlspecialchars(substr($news['content'], 0, 100)) . '...'; ?></p>
                <small class="text-muted"><?php echo date('M d, Y', strtotime($news['date'])); ?></small>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <!-- <section id="contact" class="section-padding contact-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="section-title">Get in <span>Touch</span></h2>
            <p class="text-muted">
              Connect with us to learn more about our programs, explore partnership opportunities, or discuss how we can support your development initiatives.
            </p>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-lg-5">
            <div class="info-card h-100">
              <h5 class="mb-3">Contact Information</h5>
              <p class="mb-2">
                <strong>Address:</strong><br />
                House 45, Road 12, Dhanmondi R/A<br />
                Dhaka-1209, Bangladesh
              </p>
              <p class="mb-2">
                <strong>Phone:</strong><br />
                +880-2-9661234<br />
                Mobile: +880-1711-123456
              </p>
              <p class="mb-0">
                <strong>Email:</strong><br />
                info@manobsompod.org<br />
                programs@manobsompod.org
              </p>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-card h-100">
              <form action="#" method="post">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Your name" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="you@example.com" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" placeholder="+880..." />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Subject</label>
                    <input type="text" class="form-control" placeholder="How can we help?" />
                  </div>
                  <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea
                      class="form-control"
                      rows="4"
                      placeholder="Write your message here"
                    ></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary px-4">
                      Send Message
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <?php include 'includes/footer.php'; ?>


  </body>
</html>



