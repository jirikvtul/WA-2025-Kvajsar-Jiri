<?php
/**
 * Registration Page
 * 
 * This page provides the registration form for new user accounts.
 * Features:
 * - User registration form with validation
 * - Password strength requirements
 * - Client-side password matching validation
 * - Error message handling
 * - Optional fields for additional user information
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
    <meta name="description" content="Registrace do sekce Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Registrace - Sekáčové PC sestavy</title>
    
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
            <!-- Registration form container - centered and responsive -->
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <!-- Form header -->
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="h3 mb-0"><i class="bi bi-person-plus me-2"></i>Registrace</h2>
                    </div>
                    <!-- Form body -->
                    <div class="card-body p-4">
                        <!-- Error message display with specific error types -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div>
                                    <?php
                                    // Error message handling based on error type
                                    switch ($_GET['error']) {
                                        case 'empty_fields':
                                            echo 'Vyplňte prosím všechna povinná pole.';
                                            break;
                                        case 'password_mismatch':
                                            echo 'Hesla se neshodují.';
                                            break;
                                        case 'username_taken':
                                            echo 'Uživatelské jméno je již obsazené.';
                                            break;
                                        default:
                                            echo 'Registrace se nezdařila. Zkontrolujte údaje.';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Registration form with client-side validation -->
                        <form id="registrationForm" action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/register.php" method="post">
                            <!-- Username field (required) -->
                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    <i class="bi bi-person me-1"></i>Uživatelské jméno <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <!-- Email field (optional) -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-1"></i>E-mail (nepovinný)
                                </label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <!-- Name and surname fields (optional) -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">
                                        <i class="bi bi-person-badge me-1"></i>Jméno (nepovinné)
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="surname" class="form-label">
                                        <i class="bi bi-person-badge me-1"></i>Příjmení (nepovinné)
                                    </label>
                                    <input type="text" id="surname" name="surname" class="form-control">
                                </div>
                            </div>
                            <!-- Password field with strength requirements -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="bi bi-key me-1"></i>Heslo <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="form-control"
                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                                       title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>Min. 8 znaků, 1 velké písmeno a 1 číslo
                                </div>
                            </div>
                            <!-- Password confirmation field -->
                            <div class="mb-4">
                                <label for="password_confirm" class="form-label">
                                    <i class="bi bi-key-fill me-1"></i>Potvrzení hesla <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                                <div id="passwordMatchMessage" class="form-text text-danger d-none">
                                    <i class="bi bi-exclamation-circle me-1"></i>Hesla se neshodují.
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                <i class="bi bi-person-plus me-2"></i>Registrovat se
                            </button>
                        </form>

                        <!-- Login link for existing users -->
                        <div class="mt-4 text-center">
                            <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php" class="text-decoration-none">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Již máte účet? Přihlaste se
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <!-- Client-side password matching validation script -->
    <script>
        // Get form elements
        const form = document.getElementById('registrationForm');
        const password = document.getElementById('password');
        const confirm = document.getElementById('password_confirm');
        const message = document.getElementById('passwordMatchMessage');

        // Add form submit event listener for password validation
        form.addEventListener('submit', function (e) {
            if (password.value !== confirm.value) {
                e.preventDefault();
                message.classList.remove('d-none');
            } else {
                message.classList.add('d-none');
            }
        });
    </script>
</body>
</html>