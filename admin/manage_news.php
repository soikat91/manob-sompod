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
    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header('Location: manage_news.php');
    exit();
}

// Handle add/edit
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $date = $_POST['date'];
    $image = '';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../assets/images/news/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_file = $target_dir . $image_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image = "assets/images/news/" . $image_name;
        }
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update
        $id = (int)$_POST['id'];
        if ($image) {
            $stmt = $conn->prepare("UPDATE news SET title = ?, content = ?, image = ?, date = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $title, $content, $image, $date, $id);
        } else {
            $stmt = $conn->prepare("UPDATE news SET title = ?, content = ?, date = ? WHERE id = ?");
            $stmt->bind_param("sssi", $title, $content, $date, $id);
        }
        $message = 'News updated successfully!';
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO news (title, content, image, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $image, $date);
        $message = 'News added successfully!';
    }
    $stmt->execute();
    $stmt->close();
    header('Location: manage_news.php?message=' . urlencode($message));
    exit();
}

// Get all news
$news_result = $conn->query("SELECT * FROM news ORDER BY date DESC");

// Get message from URL
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage News - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #343a40; color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,.75); padding: 0.75rem 1rem; }
        .sidebar .nav-link:hover { color: white; background: rgba(255,255,255,.1); }
        .sidebar .nav-link.active { color: white; background: #0d6efd; }
        .content { margin-left: 250px; }
    </style>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-newspaper me-2"></i>Manage News</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                    <i class="fas fa-plus me-2"></i>Add News
                </button>
            </div>

            <?php if ($message): ?>
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($news = $news_result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($news['title']); ?></td>
                                        <td><?php echo $news['date']; ?></td>
                                        <td>
                                            <?php if ($news['image']): ?>
                                                <img src="../<?php echo $news['image']; ?>" alt="News Image" style="width: 50px; height: 50px; object-fit: cover;">
                                            <?php else: ?>
                                                No image
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning edit-btn" data-id="<?php echo $news['id']; ?>" data-bs-toggle="modal" data-bs-target="#editNewsModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="?delete=<?php echo $news['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add News Modal -->
    <div class="modal fade" id="addNewsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea class="form-control" name="content" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit News Modal -->
    <div class="modal fade" id="editNewsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit News</h5>
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
                            <label class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="edit-content" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="edit-date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image (leave empty to keep current)</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update News</button>
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
                // Fetch news data via AJAX or use PHP to populate
                // For simplicity, we'll use a simple approach
                fetch(`get_news.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit-id').value = data.id;
                        document.getElementById('edit-title').value = data.title;
                        document.getElementById('edit-content').value = data.content;
                        document.getElementById('edit-date').value = data.date;
                    });
            });
        });
    </script>
</body>
</html>