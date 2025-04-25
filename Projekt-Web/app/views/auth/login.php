<?php session_start(); ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"></head>
<body class="bg-light">
    <div class="container mt-5">
    <?php include '../articles/navbar.php';?> <!-- Volání navbaru -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přihlášení uživatele</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">Neplatné přihlašovací údaje.</div>
                        <?php endif; ?>
                        <form action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno: <span class="text-danger">*</span></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Heslo: <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Přihlásit se</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/register.php">Nemáte účet? Registrujte se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>