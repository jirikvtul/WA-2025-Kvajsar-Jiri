<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat procesor</title>
    
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přidat nové CPU</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/CpuController.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Výrobce: <span class="text-danger">*</span></label>
                                <input type="text" id="manufacturer" name="manufacturer" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="model" class="form-label">Model: <span class="text-danger">*</span></label>
                                <input type="text" id="model" name="model" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="cores" class="form-label">Počet jader: <span class="text-danger">*</span></label>
                                <input type="number" id="cores" name="cores" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="threads" class="form-label">Počet vláken: <span class="text-danger">*</span></label>
                                <input type="number" id="threads" name="threads" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="base_frequency" class="form-label">Základní frekvence (GHz): <span class="text-danger">*</span></label>
                                <input type="number" id="base_frequency" name="base_frequency" class="form-control" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="turbo_frequency" class="form-label">Turbo frekvence (GHz):</label>
                                <input type="number" id="turbo_frequency" name="turbo_frequency" class="form-control" step="0.01">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Rok vydání: <span class="text-danger">*</span></label>
                                <input type="number" id="year" name="year" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Cena: <span class="text-danger">*</span></label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="socket" class="form-label">Socket: <span class="text-danger">*</span></label>
                                <input type="text" id="socket" name="socket" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Popis:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Odkaz:</label>
                                <input type="url" id="link" name="link" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">Obrázky (můžete nahrát více):</label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit procesor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>