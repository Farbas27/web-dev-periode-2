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
            <li><a href="drone.php">Product</a></li>
            <li><a href="#footer">Contact</a></li>
        </ul>
    </div>

    <div class="detail-container">

        <img src="../foto/drone.jpg" alt="Drone">
        
        <div class="detail-info">

            <h2><?php echo $product['naam']; ?></h2>

            <p class="prijs">
                Prijs: €
                <?php echo number_format($product['prijs'], 2, ',', '.'); ?>
            </p>

            <p>
                <?php echo $product['omschrijving']; ?>
            </p>

            <p>
                Drones worden tegenwoordig gebruikt in veel verschillende sectoren,
                zoals landbouw, bouw en hulpverlening. Dankzij hun camera's kunnen
                ze snel informatie verzamelen vanuit de lucht.
            </p>

            <p>
                Moderne drones beschikken over gps-systemen en sensoren waarmee ze
                veilig kunnen vliegen en beelden kunnen verzamelen voor analyse en
                onderzoek.
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