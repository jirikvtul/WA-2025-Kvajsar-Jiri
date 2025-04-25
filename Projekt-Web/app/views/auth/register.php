<?php session_start(); ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"></head>
<body class="bg-light">
    <div class="container mt-5">
    <?php include '../articles/navbar.php';?> <!-- Volání navbaru -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Registrace uživatele</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">
                                <?php
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
                        <?php endif; ?>
                        <form id="registrationForm" action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/register.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno: <span class="text-danger">*</span></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail (nepovinný):</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Jméno (nepovinné):</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Příjmení (nepovinné):</label>
                                <input type="text" id="surname" name="surname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Heslo: <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control"
                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                                       title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirm" class="form-label">Potvrzení hesla: <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                                <div id="passwordMatchMessage" class="form-text text-danger d-none">
                                    Hesla se neshodují.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Registrovat se</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php">Přihlaste se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>    <script>
        const form = document.getElementById('registrationForm');
        const password = document.getElementById('password');
        const confirm = document.getElementById('password_confirm');
        const message = document.getElementById('passwordMatchMessage');

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