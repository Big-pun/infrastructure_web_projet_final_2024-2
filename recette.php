<?php
include_once(__DIR__ . '/include/header.php');

if (!isset($_GET['id'])) { // Vérification que la page reçoit un identifiant en paramètre
  echo 'Identifiant manquant';
  exit();
}

$id = $_GET['id'];
$requete = $mysqli->prepare("SELECT recettes.nom as recette, recettes.description, recettes.temps_preparation, recettes.niveau_difficulte, ingredients.nom, ingredients.quantite FROM recettes INNER JOIN ingredients ON recettes.id = ingredients.fk_recette WHERE recettes.id = ?");

$requete->bind_param("i", $id); // Liaison du paramètre 'id' à la requête
$requete->execute();
$resultat = $requete->get_result();

$recette = []; // Initialisation du tableau pour la recette
foreach ($resultat as $row) {
  if (!isset($recette["nom"])) {
      $recette = [
          "nom" => $row["recette"],
          "description" => $row["description"],
          "temps_preparation" => $row["temps_preparation"],
          "niveau_difficulte" => $row["niveau_difficulte"],
          "ingredients" => []
      ];
  }
  $recette["ingredients"][] = $row["nom"] . " : " . $row["quantite"];
}

?>

<?php if (!empty($recette)) : ?>
  <div class="card">
    <h2><?= $recette["nom"] ?></h2>
    <h3><?= $recette["description"] ?></h3>
    <p>Temps de préparation : <?= $recette["temps_preparation"] ?> minutes</p>
    <p>Niveau : <?= $recette["niveau_difficulte"] ?></p>
    <h4>Ingrédients : </h4>
    <ul>
      <?php foreach ($recette["ingredients"] as $ingredient) : ?>
        <li><?= $ingredient ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php else : ?>
  <p>Aucune recette trouvée pour l'identifiant fourni.</p>
<?php endif; ?>

<?php include_once(__DIR__ . '/include/footer.php'); ?>