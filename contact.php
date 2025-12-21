<?php require_once 'config.php'; $contact_result = $conn->query("SELECT * FROM contact LIMIT 1"); $contact = $contact_result->fetch_assoc(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact - Manob Sompod</title>

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
            <h1 class="display-6 fw-bold mb-3">Contact <span class="text-gradient">Us</span></h1>
            <p class="lead text-muted mb-0">
              Connect with us to explore partnership opportunities, learn about our programs, or discuss how we can support your development initiatives.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Content -->
    <section class="section-padding contact-section">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-5">
            <div class="info-card h-100">
              <h5 class="mb-3">Contact Information</h5>
              <p class="mb-3">
                <strong>Head Office:</strong><br />
                <?php echo $contact['address'] ?? 'Address not set'; ?>
              </p>
              <p class="mb-3">
                <strong>Phone & Mobile:</strong><br />
                Office: <?php echo $contact['phone'] ?? 'Phone not set'; ?><br />
                Mobile: +880-1711-123456
              </p>
              <p class="mb-3">
                <strong>Email:</strong><br />
                <?php echo $contact['email'] ?? 'Email not set'; ?><br />
                programs@manobsompod.org
              </p>
              <p class="mb-0">
                <strong>Office Hours:</strong><br />
                Sunday - Thursday: 9:00 AM - 6:00 PM<br />
                Saturday: 9:00 AM - 1:00 PM
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
                    <select class="form-control">
                      <option>General Inquiry</option>
                      <option>Partnership Opportunity</option>
                      <option>Training Request</option>
                      <option>Consultancy Services</option>
                      <option>Media & Press</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea
                      class="form-control"
                      rows="4"
                      placeholder="Please describe your inquiry, partnership proposal, or how we can assist you..."
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
    </section>

    <?php include 'includes/footer.php'; ?>


  </body>
</html>


