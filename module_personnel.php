<?php 
include_once(__DIR__ . '/include/header.php'); 

// Requete SQL avec jointure pour afficher les recettes et les ingredients
$requete = $mysqli->prepare("SELECT recettes.nom as recette, recettes.description, recettes.temps_preparation, recettes.niveau_difficulte, ingredients.nom, ingredients.quantite FROM recettes INNER JOIN ingredients ON recettes.id = ingredients.fk_recette");

$requete->execute();
$resultat = $requete->get_result();

$recette = []; // initialisation du tableau pour les recettes
foreach ($resultat as $row) {
  if (!isset($recettes[$row["recette"]])) {
      $recettes[$row["recette"]] = [
          "description" => $row["description"],
          "temps_preparation" => $row["temps_preparation"],
          "niveau_difficulte" => $row["niveau_difficulte"],
          "ingredients" => []
      ];
  }
  $recettes[$row["recette"]]["ingredients"][] = $row["nom"] . " : " . $row["quantite"];
}

?>


  <main>
  
	<h1>Module personnel</h1>	
    <p class="a-programmer">Sur cette page on va retrouver chaque recette et ses ingredients dans une carte</p>
    
    <div class="">
      <!-- Affichez les enregistrement de la table que vous avez ajoutée à la base de données. -->
      <!-- La requête utilisée doit contenir un inner join pertinent. -->

    <?php if (count($recettes) > 0) : ?>
    <ul>
        <?php foreach ($recettes as $nomRecette => $details) : ?>
            <div class="">
                <h2><?= $nomRecette ?></h2>
                <h3><?= $details["description"] ?></h3>
                <p>Temps de préparation : <?= $details["temps_preparation"] ?> minutes</p>
                <p>Niveau : <?= $details["niveau_difficulte"] ?></p>
                <h4>Ingrédients : </h4>
                <ul>
                    <?php foreach ($details["ingredients"] as $ingredient) : ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Aucune recette trouvée</p>
<?php endif; ?>
      
    </div>
    
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
