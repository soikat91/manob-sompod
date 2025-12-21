<?php require_once 'config.php'; 
$gallery_result = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gallery - Manob Sompod</title>

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
            <h1 class="display-6 fw-bold mb-3">Photo <span class="text-gradient">Gallery</span></h1>
            <p class="lead text-muted mb-0">
              Explore moments from our training programs, community development projects, and impactful initiatives across Bangladesh.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Content -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="gallery-grid" id="galleryGrid">
          <?php while ($image = $gallery_result->fetch_assoc()) { ?>
          <a href="#" class="gallery-item" data-full="<?php echo htmlspecialchars($image['image_path']); ?>" data-caption="<?php echo htmlspecialchars($image['caption'] ?: 'Gallery Image'); ?>">
            <img src="<?php echo htmlspecialchars($image['image_path']); ?>" alt="<?php echo htmlspecialchars($image['caption'] ?: 'Gallery Image'); ?>" class="gallery-thumb" />
            <div class="gallery-overlay"><div class="overlay-text"><?php echo htmlspecialchars($image['caption'] ?: 'Gallery Image'); ?></div></div>
          </a>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <!-- Lightbox Modal -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0 shadow-none">
          <div class="modal-body p-0 position-relative">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            <img id="lightboxImage" src="" alt="" class="w-100 rounded" />
            <div id="lightboxCaption" class="text-white small mt-2"></div>
            <button id="lightboxPrev" class="lightbox-nav left">‹</button>
            <button id="lightboxNext" class="lightbox-nav right">›</button>
          </div>
        </div>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>

    <!-- Custom JS for Gallery -->
    <script>
      (function () {
        const items = Array.from(document.querySelectorAll('.gallery-item'));
        const modalEl = document.getElementById('lightboxModal');
        const modal = new bootstrap.Modal(modalEl, { keyboard: true });
        const lightboxImage = document.getElementById('lightboxImage');
        const lightboxCaption = document.getElementById('lightboxCaption');
        let currentIndex = -1;

        function openAt(index) {
          const item = items[index];
          if (!item) return;
          const full = item.getAttribute('data-full') || item.querySelector('img').src;
          const caption = item.getAttribute('data-caption') || item.querySelector('img').alt || '';
          lightboxImage.src = full;
          lightboxImage.alt = caption;
          lightboxCaption.textContent = caption;
          currentIndex = index;
          modal.show();
        }

        items.forEach((el, i) => {
          el.addEventListener('click', function (e) {
            e.preventDefault();
            openAt(i);
          });
        });

        document.getElementById('lightboxPrev').addEventListener('click', function () {
          openAt((currentIndex - 1 + items.length) % items.length);
        });
        document.getElementById('lightboxNext').addEventListener('click', function () {
          openAt((currentIndex + 1) % items.length);
        });

        // keyboard navigation
        document.addEventListener('keydown', function (e) {
          if (currentIndex === -1) return;
          if (e.key === 'ArrowLeft') {
            openAt((currentIndex - 1 + items.length) % items.length);
          } else if (e.key === 'ArrowRight') {
            openAt((currentIndex + 1) % items.length);
          }
        });

        // reset when modal closes
        modalEl.addEventListener('hidden.bs.modal', function () {
          lightboxImage.src = '';
          currentIndex = -1;
        });
      })();
    </script>
  </body>
</html>


