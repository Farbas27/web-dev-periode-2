<?php
// Databaseverbinding ophalen
include "includes/db.php";

// Alle producten ophalen uit de database
$producten = $pdo->query("SELECT * FROM producten")->fetchAll();

// Koppel elk database-ID aan het juiste bestand in de map details/
$links = [
    1 => "details/ominous.php",
    2 => "details/hexapod.php",
    3 => "details/robotarm.php",
    4 => "details/humanoid.php",
    5 => "details/marsrover.php",
    6 => "details/drone.php"
];
?>

<!doctype html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Robot Shop</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div id="header">
      <h1>🤖 Robot Shop</h1>

      <!-- Navigatiemenu -->
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#" onclick="gaNaarLaatsteProduct()">Product</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>

      <p>De beste robots op één plek.</p>
    </div>

    <!-- Zoekbalk -->
    <div class="zoek-container">
      <input
        type="text"
        id="zoekbalk"
        placeholder="Zoek een robot..."
        onkeyup="zoekProduct()"
      />
    </div>

    <!-- Producten -->
    <div id="content">
      <?php foreach ($producten as $product) { ?>

        <div class="product">
          <img src="foto/<?php echo $product['afbeelding']; ?>" alt="<?php echo $product['naam']; ?>">
          <h2><?php echo $product['naam']; ?></h2>
          <p>€ <?php echo number_format($product['prijs'], 2, ',', '.'); ?></p>
          <a href="<?php echo $links[$product['id']]; ?>">Bekijk robot</a>
        </div>

      <?php } ?>
    </div>

    <!-- Link naar GLU -->
    <footer id="footer">
      <p>&copy; 2026 Robot Shop</p>
      <p>
        <a href="https://glu.nl" target="_blank"> Bezoek de GLU website </a>
      </p>
    </footer>

    <script>
      // Naar het laatst bekeken product gaan
      function gaNaarLaatsteProduct() {
        let product = localStorage.getItem("laatsteProduct");

        if (product) {
          window.location.href = product;
        } else {
          alert("Je hebt nog geen product bekeken.");
        }
      }

      // Producten zoeken via de zoekbalk
      function zoekProduct() {
        let invoer = document.getElementById("zoekbalk").value.toLowerCase();
        let producten = document.querySelectorAll(".product");

        producten.forEach(function (product) {
          // Productnaam ophalen
          let naam = product.querySelector("h2").textContent.toLowerCase();

          // Product tonen of verbergen
          if (naam.includes(invoer)) {
            product.style.display = "";
          } else {
            product.style.display = "none";
          }
        });
      }
    </script>
  </body>
</html>
