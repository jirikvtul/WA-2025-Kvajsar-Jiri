<?php
/**
 * Login Page
 * 
 * This page provides the login form for user authentication.
 * Features:
 * - User authentication form
 * - Error message display
 * - Link to registration page
 * - Security measures
 */

// Start session for user authentication
session_start(); 
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Meta tags for proper character encoding and responsive viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO meta tags -->
    <meta name="description" content="Přihlášení do sekce Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Přihlášení - Sekáčové PC sestavy</title>
    
    <!-- Favicon and external resources -->
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- Bootstrap Icons for UI elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <!-- Include the navigation bar -->
    <?php include '../articles/navbar.php'; ?>

    <!-- Main content container -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Login form container - centered and responsive -->
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <!-- Form header -->
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="h3 mb-0"><i class="bi bi-box-arrow-in-right me-2"></i>Přihlášení</h2>
                    </div>
                    <!-- Form body -->
                    <div class="card-body p-4">
                        <!-- Error message display -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div>Neplatné přihlašovací údaje.</div>
                            </div>
                        <?php endif; ?>

                        <!-- Login form -->
                        <form action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/login.php" method="post">
                            <!-- Username input field -->
                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    <i class="bi bi-person me-1"></i>Uživatelské jméno <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <!-- Password input field -->
                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="bi bi-key me-1"></i>Heslo <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Přihlásit se
                            </button>
                        </form>

                        <!-- Registration link -->
                        <div class="mt-4 text-center">
                            <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/register.php" class="text-decoration-none">
                                <i class="bi bi-person-plus me-1"></i>Nemáte účet? Registrujte se
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>