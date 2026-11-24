<?php
include "includes/db.php";

// Haal het ID uit de URL (of stuur terug als het ontbreekt)
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Haal het juiste product op uit de database
$stmt = $pdo->prepare("SELECT * FROM producten WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

// Als het product niet bestaat in de database
if (!$product) {
    die("Robot niet gevonden. <a href='index.php'>Terug naar overzicht</a>");
}
?>

<!doctype html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($product['naam']); ?> - Robot Shop</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div id="header">
      <h1>🤖 Robot Shop</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Product</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>
    </div>

    <div class="detail-container">
      <img src="foto/<?php echo htmlspecialchars($product['afbeelding']); ?>" alt="<?php echo htmlspecialchars($product['naam']); ?>" />

      <div class="detail-info">
        <h2><?php echo htmlspecialchars($product['naam']); ?></h2>
        <p class="prijs">Prijs: €<?php echo number_format($product['prijs'], 2, ',', '.'); ?></p>

        <p>
          <?php echo nl2br(htmlspecialchars($product['omschrijving'])); ?>
        </p>

        <div class="detail-acties">
          <a href="bestellen.php?id=<?php echo $product['id']; ?>" class="btn-bestellen">Bestellen</a>
          <a href="index.php" class="btn-terug">← Terug naar overzicht</a>
        </div>
      </div>
    </div>

    <footer id="footer">
      <p>&copy; 2026 Robot Shop</p>
    </footer>

    <script>
      // Sla deze pagina op zodat de 'Product'-knop op index.php hiernaar terug kan linken
      localStorage.setItem("laatsteProduct", window.location.href);
    </script>
  </body>
</html>
