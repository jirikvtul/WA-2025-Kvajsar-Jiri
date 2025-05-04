<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Užitečné odkazy a programy pro stavbu PC sestav a testování hardwaru.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Užitečné odkazy - Sekáčové PC sestavy</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <?php include '../app/views/articles/navbar.php'; ?>
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Užitečné odkazy</h1>
                <p class="lead mb-0">Webové stránky a programy pro stavitele PC sestav</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Nástroje pro kompatibilitu a plánování</h2>
                        <p class="card-text">Pro plánování sestavy a kontrolu kompatibility doporučuji PCPartPicker a Alza PC Konfigurátor. Užitečná jsou také fóra jako LinusTechTips a subreddit r/buildapc, kde můžete diskutovat o svých sestavách.</p>
                        <h3 class="card-title h4">Programy pro instalaci a testování</h3>
                        <p class="card-text">Rufus je skvělý nástroj pro vytvoření bootovacích médií, např. pro instalaci Windows s možností vypnutí požadavků na Microsoft účet nebo TPM 2.0. Pro testování hardwaru použijte Cinebench a Prime95 pro CPU, 3DMark pro GPU, nebo starší, ale funkční Heaven’s Benchmark pro základní stabilitu.</p>
                        <h3 class="card-title h4">Optimalizace systému</h3>
                        <p class="card-text">CTT Windows Optimizer je open-source nástroj pro zrychlení Windows a vypnutí otravných funkcí. Zároveň slouží jako instalátor aplikací přes Winget. Pro Nvidia karty doporučuji nvcleanstall, který instaluje ovladače bez telemetrie a zbytečností.</p>
                        <h3 class="card-title h4">Zdroje a odkazy</h3>
                        <ul>
                            <li><a href="https://pcpartpicker.com">PCPartPicker</a> – Plánování PC sestav.</li>
                            <li><a href="https://www.alza.cz/pc-konfigurator">Alza PC Konfigurátor</a> – Kontrola kompatibility.</li>
                            <li><a href="https://linustechtips.com">LinusTechTips</a> – Fórum o PC sestavách.</li>
                            <li><a href="https://www.reddit.com/r/buildapc">r/buildapc</a> – Subreddit pro stavbu PC.</li>
                            <li><a href="https://rufus.ie">Rufus</a> – Bootovací média.</li>
                            <li><a href="https://www.maxon.net/en/cinebench">Cinebench</a> – Benchmark CPU.</li>
                            <li><a href="https://www.guru3d.com/files-details/prime95-download.html">Prime95</a> – Stresový test CPU.</li>
                            <li><a href="https://www.3dmark.com">3DMark</a> – Benchmark GPU.</li>
                            <li><a href="https://benchmark.unigine.com/heaven">Unigine Heaven</a> – Benchmark GPU.</li>
                            <li><a href="https://github.com/ChrisTitusTech/winutil">CTT Windows Optimizer</a> – Optimalizace Windows.</li>
                            <li><a href="https://www.techpowerup.com/download/nvidia-nvcleanstall/">nvcleanstall</a> – Optimalizace NVIDIA ovladačů.</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4">
                    <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="Ilustrační obrázek PC sestavy">
                    <div class="card-body">
                        <p class="card-text"><em>Obrázek: Ilustrační fotografie PC sestavy, zdroj: Unsplash.com.</em></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Kategorie</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="../introduction/introduction.php">Úvod</a></li>
                                    <li><a href="../compatibility/compatibility.php">Kompatibilita</a></li>
                                    <li><a href="../purchasing/purchasing.php">Nákup</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="../usefulwebsites/usefulwebsites.php">Užitečné odkazy</a></li>
                                    <li><a href="../index.php">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">O blogu</div>
                    <div class="card-body">Sekáčové PC sestavy je blog o stavbě cenově dostupných počítačů s důrazem na použité komponenty a udržitelnost.</div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">&copy; Sekáčové PC sestavy 2025</p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>