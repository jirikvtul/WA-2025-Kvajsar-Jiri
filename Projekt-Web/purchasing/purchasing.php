<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Průvodce nákupem nových a použitých PC komponentů.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Nákup komponent - Sekáčové PC sestavy</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php include '../app/views/articles/navbar.php'; ?>
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Nákup komponent</h1>
                <p class="lead mb-0 fs-4">Kde a jak nakupovat nové a použité komponenty?</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title h3 mb-4">Nové komponenty</h2>
                        <div class="card-text">
                            <p class="mb-4">Nákup nových komponentů je v České republice jednoduchý díky ověřeným prodejcům jako Alza.cz, Smarty.cz, Datart.cz, Mironet.cz a Sunnysoft.cz. Osobně mám s těmito prodejci dobrou zkušenost. Alza a Smarty nabízejí i použité nebo rozbalené zboží, ale primárně se zaměřují na nové komponenty. Nabízejí také službu sestavení PC za poplatek 999 Kč.</p>
                            <p class="mb-4">Pro úsporu doporučuji nakupovat od jednoho prodejce, ale pokud chcete ušetřit, prozkoumejte srovnávače jako Heureka.cz. Hledejte slevy, dopravu zdarma nebo prodlouženou záruku. Tímto způsobem lze ušetřit několik stovek korun, i když ne tisíce.</p>
                        </div>

                        <h3 class="h4 mb-3">Použité komponenty</h3>
                        <div class="card-text">
                            <p class="mb-4">Použité komponenty nabízejí skvělý poměr cena/výkon. I několik let starý hardware zvládne nové hry na nižší detaily, zejména díky rostoucí oblibě 2K a 4K monitorů. Hlavní portály pro nákup jsou Bazoš.cz, Aukro.cz a Facebook Marketplace.</p>
                            <p class="mb-4">Bazoš a Facebook Marketplace fungují jako tržiště bez prostředníka, takže je třeba být opatrný – vyhněte se podvodníkům, neposílejte peníze předem, preferujte osobní předání nebo dobírku. Požadujte fotky, benchmarky nebo důkaz funkčnosti.</p>
                            <p>Aukro.cz funguje jako prostředník s větší bezpečností (podobně jako eBay), nabízí záruky vrácení peněz a prodej přes aukce. Ceny jsou zde vyšší, ale bezpečnější. Alza na Aukru prodává i nefunkční nebo použité zboží, které může být výhodné, pokud umíte opravit např. ohnuté piny nebo přepastování grafické karty.</p>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="Ilustrační obrázek nákupu komponent">
                    <div class="card-body">
                        <p class="card-text text-muted"><em>Obrázek: Ilustrační fotografie nákupu PC komponent, zdroj: Unsplash.com.</em></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">Kategorie</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="../introduction/introduction.php" class="text-decoration-none">Úvod</a></li>
                                    <li class="mb-2"><a href="../compatibility/compatibility.php" class="text-decoration-none">Kompatibilita</a></li>
                                    <li class="mb-2"><a href="../purchasing/purchasing.php" class="text-decoration-none">Nákup</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="../usefulwebsites/usefulwebsites.php" class="text-decoration-none">Užitečné odkazy</a></li>
                                    <li class="mb-2"><a href="../index.php" class="text-decoration-none">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">O blogu</div>
                    <div class="card-body">
                        <p class="card-text">Sekáčové PC sestavy je blog o stavbě cenově dostupných počítačů s důrazem na použité komponenty a udržitelnost.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-4 bg-dark mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Sekáčové PC sestavy 2025</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>