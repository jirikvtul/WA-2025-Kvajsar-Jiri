<?php
/**
 * Article List Page
 * 
 * This page displays a list of all articles in the system.
 * Features:
 * - Responsive table layout of articles
 * - Article preview with truncated content
 * - Author and creation date information
 * - "New Article" button for authenticated users
 * - Security measures (XSS prevention)
 */

// Start session if not already started
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Meta tags for proper character encoding and responsive viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO meta tags -->
    <meta name="description" content="Seznam článků v sekci Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Seznam článků - Sekáčové PC sestavy</title>
    
    <!-- Favicon and external resources -->
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico" />
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
        <!-- Article list card -->
        <div class="card shadow-sm">
            <!-- Card header with title and new article button -->
            <div class="card-header bg-primary text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0"><i class="bi bi-list-ul me-2"></i>Seznam článků</h2>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- New article button - only visible to logged-in users -->
                        <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_create.php" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle me-1"></i>Nový článek
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Card body containing the article table -->
            <div class="card-body p-4">
                <?php if (!empty($articles)): ?>
                    <!-- Responsive table for article listing -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <!-- Table header -->
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bi bi-type-h1 me-1"></i>Název</th>
                                    <th><i class="bi bi-text-paragraph me-1"></i>Obsah</th>
                                    <th><i class="bi bi-person me-1"></i>Autor</th>
                                    <th><i class="bi bi-calendar me-1"></i>Vytvořeno</th>
                                </tr>
                            </thead>
                            <!-- Table body with article data -->
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <!-- Article title -->
                                        <td class="fw-medium"><?= htmlspecialchars($article['title']) ?></td>
                                        <!-- Truncated article content (first 100 characters) -->
                                        <td class="text-muted"><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                                        <!-- Author badge -->
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($article['username']) ?></span></td>
                                        <!-- Creation date -->
                                        <td><small class="text-muted"><?= htmlspecialchars($article['created_at']) ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- Message displayed when no articles are found -->
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