<?php
include "includes/db.php";

$voornaam = htmlspecialchars($_POST['voornaam'] ?? '');
$aantal = (int)($_POST['aantal'] ?? 1);
$product_id = (int)($_POST['product_id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM producten WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product niet gevonden.");
}

$totaal = $aantal * $product['prijs'];
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor uw bestelling</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="header">
    <h1>🤖 Robot Shop</h1>
</div>

<div class="detail-container">
    <div class="detail-info">

        <h2>✅ Bedankt, <?php echo $voornaam; ?>!</h2>

        <p>
            Je bestelling van de
            <strong><?php echo htmlspecialchars($product['naam']); ?></strong>
            is succesvol ontvangen.
        </p>

        <p>
            <strong>Aantal:</strong> <?php echo $aantal; ?>
        </p>

        <p class="prijs">
            Totaal: € <?php echo number_format($totaal, 2, ',', '.'); ?>
        </p>

        <a href="index.php" class="btn-terug">← Terug naar home</a>

    </div>
</div>

<footer id="footer">
    <p>&copy; 2026 Robot Shop</p>
</footer>

</body>
</html>