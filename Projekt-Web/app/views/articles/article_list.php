<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Seznam článků v sekci Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Seznam článků - Sekáčové PC sestavy</title>
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0"><i class="bi bi-list-ul me-2"></i>Seznam článků</h2>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_create.php" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle me-1"></i>Nový článek
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body p-4">
                <?php if (!empty($articles)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bi bi-type-h1 me-1"></i>Název</th>
                                    <th><i class="bi bi-text-paragraph me-1"></i>Obsah</th>
                                    <th><i class="bi bi-person me-1"></i>Autor</th>
                                    <th><i class="bi bi-calendar me-1"></i>Vytvořeno</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td class="fw-medium"><?= htmlspecialchars($article['title']) ?></td>
                                        <td class="text-muted"><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($article['username']) ?></span></td>
                                        <td><small class="text-muted"><?= htmlspecialchars($article['created_at']) ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <div>Žádný článek nebyl nalezen.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>