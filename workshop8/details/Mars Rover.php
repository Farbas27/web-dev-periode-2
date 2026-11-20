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
            <li><a href="MarsRover.php">Product</a></li>
            <li><a href="#footer">Contact</a></li>
        </ul>
    </div>

    <div class="detail-container">

        <img src="../foto/marsrover.jpg" alt="Mars Rover">

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
                Een Mars Rover is een robotvoertuig dat is ontworpen om het
                oppervlak van Mars te verkennen en wetenschappelijke gegevens
                te verzamelen.
            </p>

            <p>
                Sinds de jaren negentig zijn meerdere rovers naar Mars gestuurd.
                Deze robots onderzoeken gesteenten, maken foto's en helpen
                wetenschappers meer te leren over de geschiedenis van de planeet.
            </p>

            <p>
                Mars Rovers kunnen zelfstandig rijden en beslissingen nemen over
                hun route. Daardoor kunnen ze gebieden onderzoeken die voor
                mensen moeilijk bereikbaar zijn.
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