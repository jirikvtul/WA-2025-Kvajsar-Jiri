<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Přidání nového článku do sekce Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Přidat článek - Sekáčové PC sestavy</title>
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="h3 mb-0"><i class="bi bi-plus-circle me-2"></i>Přidat nový článek</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/ArticleController.php" method="post">
                            <div class="mb-4">
                                <label for="title" class="form-label">
                                    <i class="bi bi-pencil-square me-1"></i>Název článku <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label for="content" class="form-label">
                                    <i class="bi bi-text-paragraph me-1"></i>Obsah <span class="text-danger">*</span>
                                </label>
                                <textarea id="content" name="content" class="form-control" rows="8" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                <i class="bi bi-save me-2"></i>Uložit článek
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>