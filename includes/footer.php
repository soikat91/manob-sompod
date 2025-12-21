<!-- Footer -->
<footer class="footer bg-dark text-light py-5 mt-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <h5 class="fw-bold mb-3">Manob Sompod</h5>
        <p class="mb-3">Dedicated to social development and community welfare through sustainable initiatives and collaborative efforts.</p>
        <div class="social-links">
          <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        <h6 class="fw-bold mb-3">Quick Links</h6>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="about.php" class="text-light text-decoration-none">About Us</a></li>
          <li class="mb-2"><a href="activities.php" class="text-light text-decoration-none">Activities</a></li>
          <li class="mb-2"><a href="services.php" class="text-light text-decoration-none">Services</a></li>
          <li class="mb-2"><a href="news.php" class="text-light text-decoration-none">News</a></li>
          <li class="mb-2"><a href="gallery.php" class="text-light text-decoration-none">Gallery</a></li>
          <li class="mb-2"><a href="contact.php" class="text-light text-decoration-none">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h6 class="fw-bold mb-3">Get in Touch</h6>
        <?php
        require_once 'config.php';
        $contact_query = "SELECT * FROM contact LIMIT 1";
        $contact_result = $conn->query($contact_query);
        $contact = $contact_result->fetch_assoc();
        ?>
        <p class="small mb-2"><i class="fas fa-map-marker-alt me-2"></i><?php echo $contact['address'] ?? 'Address not set'; ?></p>
        <p class="small mb-2"><i class="fas fa-phone me-2"></i><?php echo $contact['phone'] ?? 'Phone not set'; ?></p>
        <p class="small mb-3"><i class="fas fa-envelope me-2"></i><?php echo $contact['email'] ?? 'Email not set'; ?></p>
        <a class="btn btn-primary btn-sm px-3" href="contact.php">Get in touch</a>
      </div>
    </div>
  </div>
  <div class="footer-bottom text-center">
    <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center">
      <p class="small mb-2 mb-sm-0">&copy; <span id="year"></span> Manob Sompod. All rights reserved.</p>
      <p class="small mb-0">Developed By Grammen Communications.</p>
    </div>
  </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"
></script>

<!-- Custom JS -->
<script>
  // Set current year in footer
  document.getElementById("year").textContent = new Date().getFullYear();
</script>