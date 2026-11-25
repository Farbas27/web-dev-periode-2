<?php
// Maak verbinding met de database
include "includes/db.php";

// Haal het ID uit de URL (of stuur terug naar home als het ontbreekt)
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Bereid een veilige SQL-query voor en haal het juiste product op uit de database
$stmt = $pdo->prepare("SELECT * FROM producten WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

// Stop het script en toon een melding als het product niet bestaat in de database
if (!$product) {
    die("Robot niet gevonden. <a href='index.php'>Terug naar overzicht</a>");
}
?>

<!doctype html>
<html lang="nl">
  <head>
    <!-- Basisinstellingen voor tekenset en mobiele weergave -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Dynamische paginatitel op basis van de productnaam -->
    <title><?php echo htmlspecialchars($product['naam']); ?> - Robot Shop</title>
    <!-- Koppel de externe stylesheet -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

  <!-- Header met titel en navigatiemenu -->
    <div id="header">
      <h1>🤖 Robot Shop</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Product</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>
    </div>

    <!-- Hoofdcontainer voor de productdetails -->
    <div class="detail-container">
      <!-- Afbeelding van de gekozen robot -->
      <img src="foto/<?php echo htmlspecialchars($product['afbeelding']); ?>" alt="<?php echo htmlspecialchars($product['naam']); ?>" />

      <!-- Informatieblok met naam, prijs, omschrijving en knoppen -->
      <div class="detail-info">
        <h2><?php echo htmlspecialchars($product['naam']); ?></h2>
        <!-- Toon de prijs in Nederlands valutaformaat -->
        <p class="prijs">Prijs: €<?php echo number_format($product['prijs'], 2, ',', '.'); ?></p>

        <!-- Toon de productomschrijving met behoud van regeleinden (nl2br) -->
        <p>
          <?php echo nl2br(htmlspecialchars($product['omschrijving'])); ?>
        </p>

        <!-- Actieknoppen om direct te bestellen of terug te gaan -->
        <div class="detail-acties">
          <a href="bestellen.php?id=<?php echo $product['id']; ?>" class="btn-bestellen"> Bestellen </a>
          <a href="index.php" class="btn-terug">← Terug naar overzicht</a>
        </div>
      </div>
    </div>

    <!-- Footer van de pagina -->
    <footer id="footer">
      <p>&copy; 2026 Robot Shop</p>
    </footer>

    <script>
      // Sla deze pagina op zodat de 'Product'-knop op index.php hiernaar terug kan linken
      localStorage.setItem("laatsteProduct", window.location.href);
    </script>
  </body>
</html>
