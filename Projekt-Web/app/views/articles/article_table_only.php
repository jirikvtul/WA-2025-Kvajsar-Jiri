<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container mt-5">
    <h2>Výpis článků</h2>
    <?php if (!empty($articles)): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Název</th>
                    <th>Obsah</th>
                    <th>Autor</th>
                    <th>Vytvořeno</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?= htmlspecialchars($article['title']) ?></td>
                        <td><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                        <td><?= htmlspecialchars($article['username']) ?></td>
                        <td><?= htmlspecialchars($article['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Žádný článek nebyl nalezen.</div>
    <?php endif; ?>
</div>