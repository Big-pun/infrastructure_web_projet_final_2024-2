<?php 
include_once(__DIR__ . '/include/header.php');

// Récupération de l'id de l'expérience sélectionnée
if (isset($_GET['id'])) {
  // Récupération de l'id de l'expérience
  $id_experience = $_GET['id'];
  // Vous pouvez maintenant utiliser $id_experience pour vos opérations
} else {
  // Si l'id n'est pas présent dans l'URL, afficher un message d'erreur ou effectuer une redirection
  echo "Erreur: Aucun id d'expérience sélectionné.";
  // Ou redirection vers une autre page
  // header('Location: page_erreur.php');
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
  
    <h1 class="a-programmer"><?= $experience["nom"] ?></h1>
    <p class="a-programmer"><?= $experience["description"] ?></p>
	
    <div class="a-programmer">
      <!-- Affichez la liste de tous les campings ACTIFS appartenant à l'expérience sélectionnée, en ordre alphabétique -->

      
      <!-- La mise en forme est à votre discrétion, mais ne doit pas être représentée sous forme de cartes -->
      <!-- (elle doit être différente de celle de la page d’accueil).-->
      <!-- Les informations à afficher sont :
              - l’image (statique ou dynamique selon le # picsum)
              - la région
              - le nom du camping 
              - un lien « Pour en savoir plus » menant à la fiche détaillée. 
      -->
    
      Remplacez ce texte par la liste des campings appartenant à l'expérience sélectionnée, tout en respectant les consignes inscrites en commentaires. 
    </div>

  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

