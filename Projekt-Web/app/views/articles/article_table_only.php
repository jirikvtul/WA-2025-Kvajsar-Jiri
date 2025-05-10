<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Article Table Container -->
<div class="container mt-5">
    <div class="card shadow-sm">
        <!-- Table header -->
        <div class="card-header bg-primary text-white py-3">
            <h2 class="h3 mb-0"><i class="bi bi-list-ul me-2"></i>Seznam článků</h2>
        </div>
        <!-- Table body -->
        <div class="card-body p-4">
            <?php if (!empty($articles)): ?>
                <!-- Responsive table wrapper -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <!-- Table header with column titles -->
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