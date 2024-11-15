<?php $pageTitle = "Détails d'une recette";
include_once(__DIR__ . '/include/header.php');

if (!isset($_GET['id'])) { // Vérification que la page reçoit un identifiant en paramètre
  echo 'Identifiant manquant';
  exit();
}

$id = $_GET['id'];
$requete = $mysqli->prepare("SELECT * FROM recettes WHERE recettes.id = ?");
$requete->bind_param("i", $id);
$requete->execute();
$resultat = $requete->get_result();

$recette = []; // Initialisation du tableau pour la recette
foreach ($resultat as $row) {
  if (!isset($recette["nom"])) {
    $recette = [
      "nom" => $row["nom"],
      "description" => $row["description"],
      "temps_preparation" => $row["temps_preparation"],
      "niveau_difficulte" => $row["niveau_difficulte"],
    ];
  }
}
?>

<main>

  <?php if (!empty($recette)) : ?>
    <div class="card">
      <h2><?= $recette["nom"] ?></h2>
      <h3><?= $recette["description"] ?></h3>
      <p>Temps de préparation : <?= $recette["temps_preparation"] ?> minutes</p>
      <p>Niveau : <?= $recette["niveau_difficulte"] ?></p>
      <div class="form-group">
        <a href="administration_module_personnel.php">Retour à la page admin</a>
      </div>
    </div>
  <?php else : ?>
    <p>Aucune recette trouvée pour l'identifiant fourni.</p>
  <?php endif; ?>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>