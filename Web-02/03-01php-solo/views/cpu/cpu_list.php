<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výpis procesorů</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Seznam procesorů</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../views/cpu/cpu_create.php">Přidat CPU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/cpu_list.php">Výpis CPU</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h2>Výpis procesorů</h2>
        <?php if(!empty($cpus)): ?>
            <h3>Tabulkový výpis</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Výrobce</th>
                        <th>Model</th>
                        <th>Počet jader</th>
                        <th>Počet vláken</th>
                        <th>Základní frekvence</th>
                        <th>Cena</th>
                        <th>Rok vydání</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cpus as $cpu): ?>
                        <tr>
                            <td><?= htmlspecialchars($cpu['manufacturer'])?></td>
                            <td><?= htmlspecialchars($cpu['model'])?></td>
                            <td><?= htmlspecialchars($cpu['cores'])?></td>
                            <td><?= htmlspecialchars($cpu['threads'])?></td>
                            <td><?= htmlspecialchars($cpu['base_frequency'])?> GHz</td>
                            <td><?= htmlspecialchars($cpu['price'])?> Kč</td>
                            <td><?= htmlspecialchars($cpu['year'])?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádný procesor nebyl nalezen</div>
        <?php endif;?>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>