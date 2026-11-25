<!doctype html>
<html lang="nl">
  <head>
    <!-- Basisinstellingen voor tekenset en schermgrootte op mobiel -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bestellen - Robot Shop</title>
    <!-- Koppel de externe stylesheet -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

    <!-- Header met titel, navigatiemenu en introductietekst -->
    <div id="header">
      <h1>🤖 Robot Shop</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="bestellen.php">Bestellen</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>
      <p>Plaats hier jouw robotbestelling.</p>
    </div>

    <!-- Hoofdcontainer voor het bestelformulier -->
    <div class="detail-container">
      <div class="detail-info">
        <h2>Bestellen: Robot Shop</h2>

        <!-- Formulier dat de gegevens via POST verstuurt naar bedankt.php -->
        <form class="formulier" action="bedankt.php" method="post">

          <!-- Keuzemenu voor het selecteren van een robot (stuurt product_id mee) -->
          <div class="veld">
            <label for="robot">Kies je robot</label>
            <select id="robot" name="product_id">
              <option value="1">Ominous Battlebot (€799,99)</option>
              <option value="2">Hexapod Robot (€299,99)</option>
              <option value="3">Robot Arm (€199,99)</option>
              <option value="4">Humanoid Robot (€1499,99)</option>
              <option value="5">Mars Rover (€599,99)</option>
              <option value="6">Drone (€249,99)</option>
            </select>
          </div>

          <!-- Invoerveld voor het gewenste aantal (minimaal 1, maximaal 10) -->
          <div class="veld">
            <label for="aantal">Aantal</label>
            <input
              type="number"
              id="aantal"
              name="aantal"
              min="1"
              max="10"
              value="1"
              required
            />
          </div>

          <!-- Keuzemenu voor de kleur of uitvoering van de robot -->
          <div class="veld">
            <label for="uitvoering">Kleur / Uitvoering</label>
            <select id="uitvoering" name="uitvoering">
              <option value="zwart">Mat Zwart</option>
              <option value="zilver">Cyber Zilver</option>
              <option value="cyaan">Neon Cyaan</option>
            </select>
          </div>

          <!-- Verplicht tekstveld voor de voornaam van de klant -->
          <div class="veld">
            <label for="voornaam">Voornaam</label>
            <input
              type="text"
              id="voornaam"
              name="voornaam"
              placeholder="Bijvoorbeeld: Sanne"
              required
            />
          </div>

          <!-- Verplicht tekstveld voor de achternaam van de klant -->
          <div class="veld">
            <label for="achternaam">Achternaam</label>
            <input type="text" id="achternaam" name="achternaam" required />
          </div>

          <!-- Verplicht e-mailveld met automatische e-mailvalidatie -->
          <div class="veld">
            <label for="email">E-mailadres</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="naam@voorbeeld.nl"
              required
            />
          </div>

          <!-- Optioneel tekstvak voor extra wensen of opmerkingen -->
          <div class="veld">
            <label for="opmerking">Opmerkingen (optioneel)</label>
            <textarea
              id="opmerking"
              name="opmerking"
              rows="3"
              placeholder="Bijvoorbeeld:Ik heb een suggestie voor de website, of ik kan een bepaald product niet vinden..."
            ></textarea>
          </div>

          <!-- Verplicht aanvinkvakje voor de algemene voorwaarden -->
          <div class="veld vinkje">
            <input
              type="checkbox"
              id="voorwaarden"
              name="voorwaarden"
              required
            />
            <label for="voorwaarden"
              >Ik ga akkoord met de algemene voorwaarden</label
            >
          </div>

          <!-- Verzendknop om het formulier in te dienen -->
          <input
            type="submit"
            value="Bestelling plaatsen"
            class="btn-bestellen knop"
          />
        </form>
      </div>
    </div>

    <!-- Footer met copyright en externe link -->
    <footer id="footer">
      <p>&copy; 2026 Robot Shop</p>
      <p><a href="https://glu.nl" target="_blank">Bezoek de GLU website</a></p>
    </footer>

  </body>
</html>
