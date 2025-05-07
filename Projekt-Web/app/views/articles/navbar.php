<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/index.php">
            <img src="/WA-2025-Kvajsar-Jiri/Projekt-Web/images/logo.png" 
                 alt="ReComp"
                 height="80"
                 class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/introduction/introduction.php">Úvod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/compatibility/compatibility.php">Kompatibilita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/purchasing/purchasing.php">Nákup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/usefulwebsites/usefulwebsites.php">Odkazy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/community/community.php">Komunita</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/ArticleController.php">
                            <i class="bi bi-plus-circle me-1"></i>Přidat článek
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_edit_delete.php">
                            <i class="bi bi-pencil me-1"></i>Editovat
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link px-3 text-white-50">
                            <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/logout.php">
                            <i class="bi bi-box-arrow-right me-1"></i>Odhlásit
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Přihlásit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/register.php">
                            <i class="bi bi-person-plus me-1"></i>Registrace
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>