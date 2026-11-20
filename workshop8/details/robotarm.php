<?php
include "../includes/db.php";

$stmt = $pdo->prepare("SELECT * FROM producten WHERE id = 3");
$stmt->execute();

$product = $stmt->fetch();
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['naam']; ?> - Robot Shop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div id="header">
        <h1>🤖 Robot Shop</h1>

        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="robotarm.php">Product</a></li>
            <li><a href="#footer">Contact</a></li>
        </ul>
    </div>

    <div class="detail-container">

        <img src="../foto/robotarm.jpg" alt="Robot Arm">

            <h2><?php echo $product['naam']; ?></h2>

            <p class="prijs">
                Prijs: €
                <?php echo number_format($product['prijs'], 2, ',', '.'); ?>
            </p>

            <p>
                <?php echo $product['omschrijving']; ?>
            </p>

            <p>
                Een robotarm wordt gebruikt om objecten op te pakken,
                te verplaatsen en nauwkeurig werk uit te voeren.
                In fabrieken kunnen robotarmen dezelfde taak duizenden
                keren achter elkaar uitvoeren zonder moe te worden.
            </p>

            <p>
                De geschiedenis van de robotarm begon in de jaren 50.
                Een van de eerste industriële robots was de Unimate.
                Deze robot werd gebruikt in autofabrieken om gevaarlijke
                en zware taken uit te voeren.
            </p>

            <p>
                Tegenwoordig worden robotarmen gebruikt in fabrieken,
                ziekenhuizen, laboratoria en zelfs ruimtevaartprojecten.
                Moderne robotarmen kunnen zeer nauwkeurig werken en
                worden vaak aangestuurd door geavanceerde software.
            </p>

            <div class="detail-acties">
                <a href="../bestellen.php" class="btn-bestellen">
                    Bestellen
                </a>

                <a href="../index.php" class="btn-terug">
                    ← Terug naar overzicht
                </a>
            </div>

        </div>

    </div>

    <footer id="footer">
        <p>&copy; 2026 Robot Shop</p>
    </footer>

</body>
</html>