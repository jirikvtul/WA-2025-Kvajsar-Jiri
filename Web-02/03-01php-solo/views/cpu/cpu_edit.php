<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit procesor</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Upravit procesor</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Web-02/03-01php-solo/views/cpu/cpu_create.php">Přidat CPU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/WA-2025-Kvajsar-Jiri/Web-02/03-01php-solo/controllers/cpu_list.php">Výpis CPU</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2>Upravit procesor</h2>
        <form action="/WA-2025-Kvajsar-Jiri/Web-02/03-01php-solo/controllers/cpu_edit.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="id" value="<?= htmlspecialchars($cpu['id']) ?>">
            
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Výrobce</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="<?= htmlspecialchars($cpu['manufacturer']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="<?= htmlspecialchars($cpu['model']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="cores" class="form-label">Počet jader</label>
                <input type="number" class="form-control" id="cores" name="cores" value="<?= htmlspecialchars($cpu['cores']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="threads" class="form-label">Počet vláken</label>
                <input type="number" class="form-control" id="threads" name="threads" value="<?= htmlspecialchars($cpu['threads']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="base_frequency" class="form-label">Základní frekvence (GHz)</label>
                <input type="number" step="0.1" class="form-control" id="base_frequency" name="base_frequency" value="<?= htmlspecialchars($cpu['base_frequency']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="turbo_frequency" class="form-label">Turbo frekvence (GHz)</label>
                <input type="number" step="0.1" class="form-control" id="turbo_frequency" name="turbo_frequency" value="<?= htmlspecialchars($cpu['turbo_frequency'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Rok vydání</label>
                <input type="number" class="form-control" id="year" name="year" value="<?= htmlspecialchars($cpu['year']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Cena (Kč)</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($cpu['price']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="socket" class="form-label">Socket</label>
                <input type="text" class="form-control" id="socket" name="socket" value="<?= htmlspecialchars($cpu['socket']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Popis</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($cpu['description']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Odkaz</label>
                <input type="url" class="form-control" id="link" name="link" value="<?= htmlspecialchars($cpu['link']) ?>">
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Obrázky</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                <?php if (!empty($cpu['images'])): ?>
                    <div class="mt-2">
                        <p>Aktuální obrázky:</p>
                        <?php foreach (json_decode($cpu['images']) as $image): ?>
                            <img src="<?= htmlspecialchars($image) ?>" alt="CPU obrázek" class="img-thumbnail" style="max-width: 150px; margin: 5px;">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Uložit změny</button>
                <a href="/WA-2025-Kvajsar-Jiri/Web-02/03-01php-solo/controllers/cpu_list.php" class="btn btn-secondary">Zrušit</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Form validation -->
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html> 