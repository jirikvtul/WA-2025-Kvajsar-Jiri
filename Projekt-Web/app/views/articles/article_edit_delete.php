<?php
require_once '../../models/Database.php';
require_once '../../models/Article.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php?error=please_login");
    exit();
}
$db = (new Database())->getConnection();
$articleModel = new Article($db);
$articles = $articleModel->getAll();
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazání článků</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">    <link rel="stylesheet" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/public/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
    <?php include 'navbar.php';?> <!-- Volání navbaru -->
        <?php if ($editMode): ?>
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h2>Upravit článek: <?= htmlspecialchars($articleToEdit['title']) ?></h2>
                        </div>
                        <div class="card-body">
                            <form action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_update.php" method="post">
                                <input type="hidden" name="id" value="<?= $articleToEdit['id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label">ID článku:</label>
                                    <input type="text" class="form-control" value="<?= $articleToEdit['id'] ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Název článku:</label>
                                    <input type="text" id="title" name="title" class="form-control" required value="<?= htmlspecialchars($articleToEdit['title']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Obsah:</label>
                                    <textarea id="content" name="content" class="form-control" rows="5" required><?= htmlspecialchars($articleToEdit['content']) ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <h2>Výpis článků</h2>
        <?php if (!empty($articles)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Název</th>
                        <th>Obsah</th>
                        <th>Autor</th>
                        <th>Vytvořeno</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= htmlspecialchars($article['id']) ?></td>
                            <td><?= htmlspecialchars($article['title']) ?></td>
                            <td><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                            <td><?= htmlspecialchars($article['username']) ?></td>
                            <td><?= htmlspecialchars($article['created_at']) ?></td>
                            <td>
                                <a href="?edit=<?= $article['id'] ?>" class="btn btn-sm btn-primary">Upravit</a>
                                <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_delete.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tento článek?');">Smazat</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádný článek nebyl nalezen.</div>
        <?php endif; ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>