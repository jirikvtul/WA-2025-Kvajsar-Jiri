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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/public/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Články</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_create.php">Přidat článek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php">Výpis článků</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <span class="nav-link text-white">Přihlášen jako: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/logout.php">Odhlásit se</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php">Přihlášení</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/register.php">Registrace</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>