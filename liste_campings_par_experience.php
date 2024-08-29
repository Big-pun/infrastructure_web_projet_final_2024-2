<?php 
include_once(__DIR__ . '/include/header.php');
$pageTitle = "Liste par expérience";

// Récupération de l'id de l'expérience sélectionnée
if (isset($_GET['id'])) {
  // Récupération de l'id de l'expérience
  $id_experience = $_GET['id'];
} else {
  // Si l'id n'est pas présent dans l'URL, afficher un message d'erreur ou effectuer une redirection
  echo "Erreur: Aucun id d'expérience sélectionné.";
  exit; // Arrêt du script
}




// Requête pour obtenir le nom de l'expérience sélectionnée
$requete = $mysqli->prepare("SELECT nom, description FROM experiences WHERE id = ?"); 
$requete->bind_param("i", $id_experience);
$requete->execute();
$resultat = $requete->get_result();
$experience = $resultat->fetch_assoc();

// Requête pour obtenir la liste des campings actifs appartenant à l'expérience sélectionnée
$requeteCamping = $mysqli->prepare("SELECT id, nom, region, id_picsum FROM campings WHERE actif = 1 AND experience_id = ? ORDER BY nom ASC");
$requeteCamping->bind_param("i", $id_experience);
$requeteCamping->execute();
$resultatCampings = $requeteCamping->get_result();
?>

  <main>
  
    <h1><?= $experience["nom"] ?></h1>
    <p><?= $experience["description"] ?></p>
	
    <div class="">
      <!-- Affichez la liste de tous les campings ACTIFS appartenant à l'expérience sélectionnée, en ordre alphabétique -->
      <!-- Les informations à afficher sont :
              - l’image (statique ou dynamique selon le # picsum)
              - la région
              - le nom du camping 
              - un lien « Pour en savoir plus » menant à la fiche détaillée. 
      -->

      <?php if ($resultatCampings->num_rows > 0) : ?>
        <ul>
          <?php while ($row = $resultatCampings->fetch_assoc()) : ?>
            <li class="flex">
              <h2><?= $row["nom"] ?></h2>
              <div class="background" style="background-image: url('https://picsum.photos/id/<?= $row["id_picsum"] ?>/500/300');background-size: cover; background-position: center;">
              <p><?= $row["region"] ?></p>
              </div>
              <a href="fiche_camping.php?id=<?= $row["id"] ?>">Pour en savoir plus</a>
              </div>
            </li>
            <br/>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>Aucun camping actif pour cette expérience.</p>
      <?php endif; ?>



    
     </div>

  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

