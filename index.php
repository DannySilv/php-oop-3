<?php
require_once __DIR__ . "/Product.php";
require_once __DIR__ . "/Food.php";
require_once __DIR__ . "/Games.php";
require_once __DIR__ . "/Kennels.php";
require_once __DIR__ . "/User.php";

// Creo le categorie e i rispettivi prodotti
$croccantini = new Food("Croccantini", "Friskies", "Cibo Secco", "1Kg", "07/24", 10);
$umido = new Food("Umido", "Purina", "Umido", "500Gr", "11/22", 7);
$gelatina = new Food("Gelatina", "Royal Canin", "Gelatina", "400Gr", "10/22", 5);

$palla = new Games("Palla", "Gomma", "Piccola", 3);
$gomitolo = new Games("Gomitolo", "Tessuto", "Media", 4);
$tiragraffi = new Games("Tiragraffi", "Cartone", "Grande", 16);

$cuccia1 = new Kennels("Cuccia Piccola", "Pelliccia artificiale e plastica", "2x4", "Interno", 19);
$cuccia2 = new Kennels("Cuccia Media", "Legno e cotone", "6x4", "Esterno", 25);
$cuccia3 = new Kennels("Cuccia Grande", "Legno e lana", "10x15", "Esterno", 40);
$cuccia3->available = false;

// Creo due utenti e aggiungo prodotti al loro carrello
$daniele = new User("Daniele", "daniele@hotmail.it", true);
$daniele->toCart($umido);
$daniele->toCart($cuccia2);
$daniele->toCart($gomitolo);

// Faccio in modo che la carta del secondo utente non sia valida
$matteo = new User("Matteo", "matteo@outlook.it", false);
$matteo->toCart($croccantini);
$matteo->toCart($tiragraffi);

try {
  $daniele->toCart($cuccia3);
} catch (Exception $e) {
  echo "Le Cucce Grandi non sono ancora disponibili!";
}

echo "<br>";

// Registro il primo utente per mostrare lo sconto
echo $daniele->register()

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>PhpOop2</title>
</head>
<body>
  <h1>I Nostri Prodotti</h1>
  <div class="products-container">
    <div class="col">
      <h2>Cibo</h2>
      <ul>
          <li> <?php echo $croccantini->printInfo(); ?> </li>
          <li> <?php echo $umido->printInfo(); ?> </li>
          <li> <?php echo $gelatina->printInfo(); ?> </li>
      </ul>
    </div>
    <div class="col">
      <h2>Giochi</h2>
      <ul>
          <li> <?php echo $palla->printInfo(); ?> </li>
          <li> <?php echo $gomitolo->printInfo(); ?> </li>
          <li> <?php echo $tiragraffi->printInfo(); ?> </li>
      </ul>
    </div>
    <div class="col">
      <h2>Cucce</h2>
      <ul>
          <li> <?php echo $cuccia1->printInfo(); ?> </li>
          <li> <?php echo $cuccia2->printInfo(); ?> </li>
          <li> <?php echo $cuccia3->printInfo(); ?> </li>
      </ul>
    </div>
  </div>

  <div class="cart">
    <h2>Ciao <?php echo $daniele->name; ?>! Questo è il tuo carrello:</h2>
      <ul>
          <?php foreach($daniele->cart as $element) { ?>
          <li><?php echo "$element->name" . " - " . "€ $element->price"; ?></li>
          <?php } ?>
      </ul>
    <h3>Totale: € <?php echo $daniele->getTotal(); ?></h3>
  </div>

  <p>
    <?php
      if ($daniele->isPaymentExpired()) {
        echo "Puoi procedere con il pagamento!";
      }
      else {
        echo "La tua carta non è valida! Aggiorna il tuo metodo di pagamento per procedere.";
      }
    ?>
  </p>

  <div class="cart">
    <h2>Ciao <?php echo $matteo->name; ?>! Questo è il tuo carrello:</h2>
      <ul>
          <?php foreach($matteo->cart as $element) { ?>
          <li><?php echo $element->name . " - " . "€ $element->price"; ?></li>
          <?php } ?>
      </ul>
    <h3>Totale: € <?php echo $matteo->getTotal(); ?></h3>
  </div>

  <p>
    <?php
      if ($matteo->isPaymentExpired()) {
        echo "Puoi procedere con il pagamento!";
      }
      else {
        echo "La tua carta non è valida! Aggiorna il tuo metodo di pagamento per procedere.";
      }
    ?>
  </p>
</body>
</html>