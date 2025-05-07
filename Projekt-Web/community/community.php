<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load database connection
require_once __DIR__ . '/../app/models/Database.php';
require_once __DIR__ . '/../app/models/Article.php';

try {
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);
    $articles = $articleModel->getAll();
} catch (PDOException $e) {
    $error = "Chyba při načítání článků. Zkuste to prosím později.";
    $articles = [];
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Komunitní sekce pro sdílení zkušeností a diskuzi o PC sestavách.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Komunita - Sekáčové PC sestavy</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php include '../app/views/articles/navbar.php'; ?>

    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Komunitní sekce</h1>
                <p class="lead mb-0 fs-4">Sdílejte své zkušenosti a diskutujte o PC sestavách</p>
            </div>
        </div>
    </header>

    <div class="container mb-5">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (empty($articles)): ?>
            <div class="alert alert-info" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                Zatím zde nejsou žádné příspěvky.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">
                                        <i class="bi bi-pencil-square me-2"></i>
                                        <?= htmlspecialchars($article['title']) ?>
                                    </h5>
                                    <small>
                                        <i class="bi bi-person-circle me-1"></i>
                                        <?= htmlspecialchars($article['username']) ?>
                                    </small>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?= nl2br(htmlspecialchars(substr($article['content'], 0, 200))) ?>
                                    <?= strlen($article['content']) > 200 ? '...' : '' ?>
                                </p>
                                <button class="btn btn-outline-primary btn-sm" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#content<?= $article['id'] ?>" 
                                        aria-expanded="false" 
                                        aria-controls="content<?= $article['id'] ?>">
                                    <i class="bi bi-arrows-expand me-1"></i>Zobrazit celý článek
                                </button>
                                <div class="collapse mt-3" id="content<?= $article['id'] ?>">
                                    <div class="card card-body bg-light">
                                        <?= nl2br(htmlspecialchars($article['content'])) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <small>
                                    <i class="bi bi-calendar me-1"></i>
                                    <?= date('d.m.Y H:i', strtotime($article['created_at'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
