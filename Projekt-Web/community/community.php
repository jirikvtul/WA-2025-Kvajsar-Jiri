<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1) Načtení připojení k DB 
require_once __DIR__ . '../app/controllers/ArticleController.php';
// DatabaseController vrací PDO instanci:
$pdo = DatabaseController::getConnection();

// 2) Načtení všech článků spolu s autorem
$sql = "
    SELECT a.id, a.title, a.content, a.created_at, u.username
    FROM articles AS a
    JOIN users    AS u ON a.user_id = u.id
    ORDER BY a.created_at DESC
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Community – ReComp</title>
    <!-- link na Bootstrap CSS (přidejte stejně jako v ostatních stránkách) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <!-- váš stávající navbar -->
    <?php include '../app/views/articles/navbar.php';?>

    <div class="container mt-4">
        <h1 class="mb-4">Community</h1>

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nadpis</th>
                    <th>Autor</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $art): ?>
                <tr
                  data-bs-toggle="collapse"
                  data-bs-target="#content<?= $art['id'] ?>"
                  aria-expanded="false"
                  aria-controls="content<?= $art['id'] ?>"
                  style="cursor:pointer;"
                >
                    <td><?= htmlspecialchars($art['title']) ?></td>
                    <td><?= htmlspecialchars($art['username']) ?></td>
                    <td><?= date('d.m.Y H:i', strtotime($art['created_at'])) ?></td>
                </tr>
                <tr class="collapse" id="content<?= $art['id'] ?>">
                    <td colspan="3" class="bg-light">
                        <?= nl2br(htmlspecialchars($art['content'])) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (bundle včetně Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
