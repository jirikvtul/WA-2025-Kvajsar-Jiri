<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pochopení kompatibility PC komponentů pro stavbu vlastní sestavy.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Kompatibilita - Sekáčové PC sestavy</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <?php include '../app/views/articles/navbar.php'; ?>
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Kompatibilita komponentů</h1>
                <p class="lead mb-0">Pochopení PC komponent a jejich kompatibility</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Základní komponenty PC</h2>
                        <p class="card-text">Každá PC sestava se skládá minimálně ze 7 komponent, bez kterých není možné počítač zprovoznit: CPU (procesor), MOBO (základní deska), GPU (grafická karta), RAM (operační paměť), SSD/HDD (úložiště), PSU (zdroj), PC Case (skříň).</p>
                        <h3 class="card-title h4">Procesor a základní deska</h3>
                        <p class="card-text">Klíčová je vzájemná kompatibilita procesoru a základní desky, zejména shoda patice. Například procesor AMD Ryzen 7 9800X3D používá patici AM5 (LGA – Land Grid Array), kde jsou piny na základní desce. Naopak PGA (Pin Grid Array) má piny na procesoru. Pro nadšence je výhodnější PGA patice (např. AM4), protože ohnutý pin lze snáze opravit doma šroubovákem nebo párátkem. U LGA patic (AM5, moderní Intel) je oprava složitější.</p>
                        <h3 class="card-title h4">Paměť RAM</h3>
                        <p class="card-text">Po výběru platformy je třeba zajistit kompatibilitu RAM. Nejnovější jsou DDR5 paměti, ale starší sestavy často používají DDR4. Systém nebude fungovat, pokud RAM nesplňuje požadavky základní desky.</p>
                        <h3 class="card-title h4">Grafická karta</h3>
                        <p class="card-text">Pro herní výkon volte nejvýkonnější grafickou kartu v rámci rozpočtu, pro střih videí nebo práci investujte více do CPU a RAM. Grafické karty se připojují přes PCI-Express port a liší se výkonem a rozměry. Například GIGABYTE RTX 4060 AERO OC 8G vyžaduje zdroj minimálně 450 W, ale doporučuji 600–650 W od kvalitního výrobce, aby se předešlo zkratu a poškození systému.</p>
                        <h3 class="card-title h4">Rozměry systému (Form-Factor MOBO)</h3>
                        <p class="card-text">Základní desky se dělí podle velikosti: mini-ITX (kompaktní, pro zkušené), m-ATX (kompromis velikosti a funkcí), ATX (standardní, ideální pro začátečníky). Formát ovlivňuje kompatibilitu se skříní a dalším hardwarem.</p>
                        <h3 class="card-title h4">Pomocníci při výběru komponent</h3>
                        <p class="card-text">Pro začátečníky jsou užitečné nástroje jako PCPartPicker nebo Alza PC Konfigurátor, které zajišťují kompatibilitu komponent. Doporučuji také tutoriály a fóra jako LinusTechTips nebo subreddit r/buildapc.</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="Ilustrační obrázek PC komponent">
                    <div class="card-body">
                        <p class="card-text"><em>Obrázek: Rozdíl mezi LGA a PGA paticemi, zdroj: Unsplash.com.</em></p>
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