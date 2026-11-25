<?php
// Maak verbinding met de database
include "includes/db.php";

// Haal de formuliergegevens op uit POST en maak ze veilig
$voornaam = htmlspecialchars($_POST['voornaam'] ?? ''); // Bescherm tegen XSS-aanvallen
$aantal = (int)($_POST['aantal'] ?? 1);                 // Zet aantal om naar een geheel getal (standaard 1)
$product_id = (int)($_POST['product_id'] ?? 0);         // Zet product-ID om naar een geheel getal (standaard 0)

// Bereid een veilige SQL-query voor om het gekozen product op te halen
$stmt = $pdo->prepare("SELECT * FROM producten WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Stop het script als het product niet in de database bestaat
if (!$product) {
    die("Product niet gevonden.");
}

// Bereken de totaalprijs van de bestelling
$totaal = $aantal * $product['prijs'];
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor uw bestelling</title>
    <!-- Koppel de externe stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Header van de webshop -->
<div id="header">
    <h1>🤖 Robot Shop</h1>
</div>

<!-- Hoofdcontainer met de bestelbevestiging -->
<div class="detail-container">
    <div class="detail-info">

        <!-- Persoonlijke bedanktitel met de ingevulde voornaam -->
        <h2>✅ Bedankt, <?php echo $voornaam; ?>!</h2>

        <!-- Toon de naam van het bestelde product -->
        <p>
            Je bestelling van de
            <strong><?php echo htmlspecialchars($product['naam']); ?></strong>
            is succesvol ontvangen.
        </p>

        <!-- Toon het bestelde aantal -->
        <p>
            <strong>Aantal:</strong> <?php echo $aantal; ?>
        </p>

        <!-- Toon de totaalprijs in Nederlands valutaformaat (bijv. 12,50) -->
        <p class="prijs">
            Totaal: € <?php echo number_format($totaal, 2, ',', '.'); ?>
        </p>

        <!-- Knop om terug te keren naar de homepagina -->
        <a href="index.php" class="btn-terug">← Terug naar home</a>

    </div>
</div>

<!-- Footer van de pagina -->
<footer id="footer">
    <p>&copy; 2026 Robot Shop</p>
</footer>

</body>
</html>
