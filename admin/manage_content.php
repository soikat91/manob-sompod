<?php
session_start();
require_once '../config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle update
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $about_content = $_POST['about_content'];
    $mission_content = $_POST['mission_content'];

    // Update about
    $stmt = $conn->prepare("UPDATE about SET content = ? WHERE id = 1");
    $stmt->bind_param("s", $about_content);
    $stmt->execute();
    $stmt->close();

    // Update mission
    $stmt = $conn->prepare("UPDATE mission SET content = ? WHERE id = 1");
    $stmt->bind_param("s", $mission_content);
    $stmt->execute();
    $stmt->close();

    $message = 'Content updated successfully!';
    header('Location: manage_content.php?message=' . urlencode($message));
    exit();
}

// Get current content
$about_result = $conn->query("SELECT content FROM about WHERE id = 1");
$about_content = $about_result->fetch_assoc()['content'] ?? '';

$mission_result = $conn->query("SELECT content FROM mission WHERE id = 1");
$mission_content = $mission_result->fetch_assoc()['content'] ?? '';

// Get message from URL
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Content Pages - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid p-4">
            <h2><i class="fas fa-edit me-2"></i>Manage Content Pages</h2>

            <?php if ($message): ?>
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <!-- About Page -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">About Page Content</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Content (HTML allowed)</label>
                            <textarea class="form-control" name="about_content" rows="10" required><?php echo htmlspecialchars($about_content); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Mission Page -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Mission Page Content</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Content (HTML allowed)</label>
                            <textarea class="form-control" name="mission_content" rows="10" required><?php echo htmlspecialchars($mission_content); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>Update Content
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>