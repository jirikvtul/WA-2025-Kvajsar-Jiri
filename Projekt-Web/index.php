<!DOCTYPE html>
<html lang="cs">
    <head>
        <!-- Meta tags for proper character encoding and responsive viewport -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- SEO meta tags for better search engine visibility -->
        <meta name="description" content="Blog o stavbě PC sestav s důrazem na použité komponenty a udržitelnost." />
        <meta name="author" content="Jiří Kvajsar" />
        <title>Home | ReComp</title>
        
        <!-- Favicon for browser tab icon -->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        
        <!-- External CSS frameworks and libraries -->
        <!-- Bootstrap 5.3.5 for responsive layout and components -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <!-- Bootstrap Icons for scalable vector icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="bg-light">
        <!-- Navigation bar included from separate file for better maintainability -->
        <?php include 'app/views/articles/navbar.php';?>
        
        <!-- Hero section with main title and tagline -->
        <header class="py-5 bg-warning border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder display-4">Sekáčové PC sestavy</h1>
                    <p class="lead mb-0 fs-4">Vše o PC sestavách, tipech a užitečných programech!</p>
                </div>
            </div>
        </header>

        <!-- Main content container -->
        <div class="container">
            <div class="row g-4">
                <!-- Left column - Main content area (8 columns wide on large screens) -->
                <div class="col-lg-8">
                    <!-- Grid of featured sections -->
                    <div class="row g-4">
                        <!-- Compatibility section card -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <!-- Card header with icon and title -->
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-cpu-fill text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Kompatibilita komponentů</h2>
                                    </div>
                                    <!-- Card content -->
                                    <p class="card-text">Naučte se, jak správně vybrat kompatibilní komponenty pro vaši PC sestavu. Zjistěte, které kombinace fungují nejlépe a jak se vyhnout běžným problémům.</p>
                                    <!-- Call-to-action button -->
                                    <a class="btn btn-primary mt-auto" href="compatibility/compatibility.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Purchasing section card -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-cart-fill text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Nákup komponent</h2>
                                    </div>
                                    <p class="card-text">Objevte nejlepší místa pro nákup nových i použitých komponent. Naučte se, jak vybrat kvalitní součástky a ušetřit při stavbě vašeho PC.</p>
                                    <a class="btn btn-primary mt-auto" href="purchasing/purchasing.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Useful links section card -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-link-45deg text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Užitečné odkazy</h2>
                                    </div>
                                    <p class="card-text">Kolekce nejlepších nástrojů, webů a aplikací pro stavbu a správu PC. Od benchmarků po diagnostické nástroje - vše na jednom místě.</p>
                                    <a class="btn btn-primary mt-auto" href="usefulwebsites/usefulwebsites.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Community section card -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-people-fill text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Komunitní sekce</h2>
                                    </div>
                                    <p class="card-text">Připojte se k naší komunitě a sdílejte své zkušenosti. Diskutujte o PC sestavách, ptejte se na rady a pomozte ostatním.</p>
                                    <a class="btn btn-primary mt-auto" href="community/community.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right column - Sidebar (4 columns wide on large screens) -->
                <div class="col-lg-4">
                    <!-- Categories widget -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="bi bi-grid-3x3-gap me-2"></i>Kategorie
                        </div>
                        <div class="card-body">
                            <!-- Two-column layout for categories -->
                            <div class="row">
                                <!-- Left column of categories -->
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <a href="introduction/introduction.php" class="text-decoration-none">
                                                <i class="bi bi-info-circle me-1"></i>Úvod do problematiky
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="compatibility/compatibility.php" class="text-decoration-none">
                                                <i class="bi bi-cpu me-1"></i>Kompatibilita komponentů
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="purchasing/purchasing.php" class="text-decoration-none">
                                                <i class="bi bi-cart me-1"></i>Nákup komponent
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Right column of categories -->
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <a href="usefulwebsites/usefulwebsites.php" class="text-decoration-none">
                                                <i class="bi bi-link me-1"></i>Užitečné odkazy
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="community/community.php" class="text-decoration-none">
                                                <i class="bi bi-people me-1"></i>Komunita
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer section -->
        <footer class="py-4 bg-dark mt-5">
            <div class="container">
                <p class="m-0 text-center text-white">&copy; Sekáčové PC sestavy 2025</p>
            </div>
        </footer>

        <!-- Bootstrap JavaScript bundle for interactive components -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>     
    </body>
</html>