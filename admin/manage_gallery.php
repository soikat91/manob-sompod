<?php
session_start();
require_once '../config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header('Location: manage_gallery.php');
    exit();
}

// Handle add/edit
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $image_path = '';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../assets/images/gallery/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_file = $target_dir . $image_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = "assets/images/gallery/" . $image_name;
        }
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update
        $id = (int)$_POST['id'];
        if ($image_path) {
            $stmt = $conn->prepare("UPDATE gallery SET title = ?, image_path = ?, description = ? WHERE id = ?");
            $stmt->bind_param("sssi", $title, $image_path, $description, $id);
        } else {
            $stmt = $conn->prepare("UPDATE gallery SET title = ?, description = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $description, $id);
        }
        $message = 'Gallery image updated successfully!';
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO gallery (title, image_path, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $image_path, $description);
        $message = 'Gallery image added successfully!';
    }
    $stmt->execute();
    $stmt->close();
    header('Location: manage_gallery.php?message=' . urlencode($message));
    exit();
}

// Get all gallery images
$gallery_result = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC");

// Get message from URL
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gallery-img { width: 80px; height: 80px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-images me-2"></i>Manage Gallery</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImageModal">
                    <i class="fas fa-plus me-2"></i>Add Image
                </button>
            </div>

            <?php if ($message): ?>
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php while ($image = $gallery_result->fetch_assoc()): ?>
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <img src="../<?php echo $image['image_path']; ?>" class="card-img-top gallery-img" alt="<?php echo htmlspecialchars($image['title']); ?>">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo htmlspecialchars($image['title']); ?></h6>
                                        <p class="card-text small"><?php echo htmlspecialchars(substr($image['description'], 0, 50)) . '...'; ?></p>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-warning edit-btn" data-id="<?php echo $image['id']; ?>" data-bs-toggle="modal" data-bs-target="#editImageModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="?delete=<?php echo $image['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Image Modal -->
    <div class="modal fade" id="addImageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Image Modal -->
    <div class="modal fade" id="editImageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="edit-title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="edit-description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image (leave empty to keep current)</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Edit button functionality
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                fetch(`get_gallery_image.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit-id').value = data.id;
                        document.getElementById('edit-title').value = data.title;
                        document.getElementById('edit-description').value = data.description;
                    });
            });
        });
    </script>
</body>
</html>