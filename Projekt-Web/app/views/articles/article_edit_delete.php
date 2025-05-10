<?php
/**
 * Article Management Page
 * 
 * This page provides functionality for editing and deleting articles.
 * Features:
 * - Authentication check
 * - Article editing form
 * - Article listing with actions
 * - Delete confirmation
 * - Security measures
 */

// Include required model files
require_once '../../models/Database.php';
require_once '../../models/Article.php';

// Start session and check authentication
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php?error=please_login");
    exit();
}

// Initialize database connection and article model
$db = (new Database())->getConnection();
$articleModel = new Article($db);
$articles = $articleModel->getAll();

// Handle edit mode
$editMode = false;
$articleToEdit = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $articleToEdit = $articleModel->getById($editId);
    if ($articleToEdit) {
        $editMode = true;
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Meta tags for proper character encoding and responsive viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO meta tags -->
    <meta name="description" content="Správa článků v sekci Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Správa článků - Sekáčové PC sestavy</title>
    
    <!-- Favicon and external resources -->
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- Bootstrap Icons for UI elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content container -->
    <div class="container mt-5">
        <?php if ($editMode): ?>
            <!-- Edit Article Form -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <!-- Form header -->
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h2 class="h3 mb-0">
                                <i class="bi bi-pencil-square me-2"></i>Upravit článek: <?= htmlspecialchars($articleToEdit['title']) ?>
                            </h2>
                        </div>
                        <!-- Form body -->
                        <div class="card-body p-4">
                            <form action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_update.php" method="post">
                                <!-- Hidden article ID field -->
                                <input type="hidden" name="id" value="<?= $articleToEdit['id'] ?>">
                                
                                <!-- Article ID display (disabled) -->
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="bi bi-hash me-1"></i>ID článku
                                    </label>
                                    <input type="text" class="form-control" value="<?= $articleToEdit['id'] ?>" disabled>
                                </div>
                                
                                <!-- Article title input -->
                                <div class="mb-4">
                                    <label for="title" class="form-label">
                                        <i class="bi bi-pencil-square me-1"></i>Název článku
                                    </label>
                                    <input type="text" id="title" name="title" class="form-control" required value="<?= htmlspecialchars($articleToEdit['title']) ?>">
                                </div>
                                
                                <!-- Article content textarea -->
                                <div class="mb-4">
                                    <label for="content" class="form-label">
                                        <i class="bi bi-text-paragraph me-1"></i>Obsah
                                    </label>
                                    <textarea id="content" name="content" class="form-control" rows="8" required><?= htmlspecialchars($articleToEdit['content']) ?></textarea>
                                </div>
                                
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    <i class="bi bi-save me-2"></i>Uložit změny
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Article List Section -->
        <div class="card shadow-sm mt-4">
            <!-- List header with new article button -->
            <div class="card-header bg-primary text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0"><i class="bi bi-list-ul me-2"></i>Seznam článků</h2>
                    <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_create.php" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Nový článek
                    </a>
                </div>
            </div>
            
            <!-- Article list table -->
            <div class="card-body p-4">
                <?php if (!empty($articles)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <!-- Table header -->
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bi bi-hash me-1"></i>ID</th>
                                    <th><i class="bi bi-pencil-square me-1"></i>Název</th>
                                    <th><i class="bi bi-text-paragraph me-1"></i>Obsah</th>
                                    <th><i class="bi bi-person me-1"></i>Autor</th>
                                    <th><i class="bi bi-calendar me-1"></i>Vytvořeno</th>
                                    <th><i class="bi bi-gear me-1"></i>Akce</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <!-- Article ID -->
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($article['id']) ?></span></td>
                                        <!-- Article title -->
                                        <td class="fw-medium"><?= htmlspecialchars($article['title']) ?></td>
                                        <!-- Truncated article content -->
                                        <td class="text-muted"><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                                        <!-- Author -->
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($article['username']) ?></span></td>
                                        <!-- Creation date -->
                                        <td><small class="text-muted"><?= htmlspecialchars($article['created_at']) ?></small></td>
                                        <!-- Action buttons -->
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <!-- Edit button -->
                                                <a href="?edit=<?= $article['id'] ?>" class="btn btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <!-- Delete button with confirmation -->
                                                <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_delete.php?id=<?= $article['id'] ?>" 
                                                   class="btn btn-outline-danger"
                                                   onclick="return confirm('Opravdu chcete smazat tento článek?');">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- No articles message -->
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <div>Žádný článek nebyl nalezen.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>