<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/index.php">Sekáčové PC sestavy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/introduction/introduction.php">Úvod</a></li>
                <li class="nav-item"><a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/compatibility/compatibility.php">Kompatibilita komponentů</a></li>
                <li class="nav-item"><a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/purchasing/purchasing.php">Nákup komponent</a></li>
                <li class="nav-item"><a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/usefulwebsites/usefulwebsites.php">Užitečné odkazy</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/ArticleController.php">Přidat článek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_edit_delete.php">Editovat článek</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-white">Přihlášen: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
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